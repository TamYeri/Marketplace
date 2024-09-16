<?php

namespace CrazyMesut\Marketplace\Hepsiburada\Services;

class OrderService
{
    private $client;
    private $options;

    private $orders = [];

    public function __construct($client, array $options)
    {
        $this->options = $options;
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://oms-external.hepsiburada.com/packages/merchantid/' . $this->options['merchantId'],
            'headers' => [
                'Accept' => 'application/json',
                'Cache-Control' => 'no-cache',
                'User-Agent' => 'tamyeri_dev',
            ],
            'auth' => [$options['username'], $options['password']]
        ]);
    }

    public function getResponse(): array
    {
        return $this->orders;
    }

    public function getOrders(array $params): static
    {
        $res = $this->client->get('', $params)->getBody();

        echo $res;
        return $this;
    }

    public function updateTrackingNumber($shipmentPackageId, $trackingNumber)
    {
        $res = $this->client->put($shipmentPackageId . '/update-tracking-number', ['json' => ['trackingNumber' => $trackingNumber]])->getBody();
        return $res->getStatusCode();
    }
}
