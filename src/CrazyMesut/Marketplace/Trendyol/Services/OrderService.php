<?php

namespace CrazyMesut\Marketplace\Trendyol\Services;

class OrderService
{
    private $client;
    private $options;

    private $orders = [];

    public function __construct($client, array $options)
    {
        $this->client = $client;
        $this->options = $options;
    }

    public function getResponse(): array
    {
        return $this->orders;
    }

    public function getOrders(array $params): static
    {
        $totalPage = 1;
        do {
            //echo $params['page'], PHP_EOL;
            $res = $this->client->get('orders', ['json' => $params])->getBody();
            $res = json_decode($res);
            if (isset($res->content))
                $this->orders = array_merge($this->orders, $res->content);
            if (isset($res->totalPages))
                $totalPage = $res->totalPages;
            $params['page']++;
        } while ($totalPage > $params['page']);
        return $this;
    }

    public function updateTrackingNumber($shipmentPackageId, $trackingNumber)
    {
        $res = $this->client->put($shipmentPackageId . '/update-tracking-number', ['json' => ['trackingNumber' => $trackingNumber]])->getBody();
        return $res->getStatusCode();
    }
}
