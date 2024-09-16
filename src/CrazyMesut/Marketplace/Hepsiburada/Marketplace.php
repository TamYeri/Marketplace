<?php

namespace CrazyMesut\Marketplace\Hepsiburada;

class Marketplace
{
    protected $options;
    private $client;

    public function __construct(array $options)
    {
        $this->options = $options;
    }

    public function createService($serviceName): object
    {
        echo $className = "\\CrazyMesut" . "\\" . "Marketplace" . "\\" . "Hepsiburada" . "\\" . "Services" . "\\" . $serviceName;
        if (class_exists($className))
            return new $className($this->client, $this->options);
        throw new \Exception("{$className} does not exists");
    }
}
