<?php

namespace CrazyMesut\Marketplace;


class MarketplaceFactory
{
    private $marketplaceName;
    private $options = [];
    public function __construct($name, $options = [])
    {
        $this->marketplaceName = $name;
        $this->options = $options;
    }

    public function setSellerId($id)
    {
        $this->options['sellerId'] = $id;
        return $this;
    }

    public function setApiKey($key)
    {
        $this->options['apiKey'] = $key;
        return $this;
    }

    public function setApiSecret($secret)
    {
        $this->options['apiSecret'] = $secret;
        return $this;
    }

    public function setUsername($name){
        $this->options['username'] = $name;
        return $this;
    }

    public function setPassword($password){
        $this->options['password'] = $password;
        return $this;
    }

    public function setMerchantId($merchantId){
        $this->options['merchantId'] = $merchantId;
        return $this;
    }

    public function createMarketplace()
    {
        $className = "\\CrazyMesut" . "\\" . "Marketplace" . "\\" . $this->marketplaceName . "\\" . "Marketplace";
        if (class_exists($className))
            return new $className($this->options);
        throw new \Exception("{$className} does not exists");
    }

    public static function createMp(string $name, array $options)
    {
        $className = "\\CrazyMesut" . "\\" . "Marketplace" . "\\" . $name . "\\" . "Marketplace";
        if (class_exists($className))
            return new $className($options);
        throw new \Exception("{$className} does not exists");
    }

}
