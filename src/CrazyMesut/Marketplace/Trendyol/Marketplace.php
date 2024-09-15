<?php

namespace CrazyMesut\Marketplace\Trendyol;

use Illuminate\Support\Facades\Http;

class Marketplace
{
    protected $options;
    private $client;

    public function __construct(array $options)
    {
        $this->options = $options;
        $this->client = new \GuzzleHttp\Client([
            'debug' => false,
            'base_uri' => 'https://api.trendyol.com/sapigw/suppliers/' . $options['sellerId'] . '/',
            'headers' => [
                'Accept' => 'application/json',
                'Cache-Control' => 'no-cache',
                'User-Agent' => $options['sellerId'] . '-CrazyMesut',
            ],
            'auth' => [$options['apiKey'], $options['apiSecret']]
        ]);
    }

    public function createService($serviceName): object
    {
        $className = "\\CrazyMesut" . "\\" . "Marketplace" . "\\" . "Trendyol" . "\\" . "Services" . "\\" . $serviceName;
        if (class_exists($className))
            return new $className($this->client, $this->options);
        throw new \Exception("{$className} does not exists");
    }
}
