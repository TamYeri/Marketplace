<?php

namespace CrazyMesut\Marketplace;


class MarketplaceFactory
{
    public function __construct()
    {

    }

    public static function createMp(string $name, array $options)
    {
        $className = "\\CrazyMesut" . "\\" . "Marketplace" . "\\" . $name . "\\" . "Marketplace";
        if (class_exists($className))
            return new $className($options);
        throw new \Exception("{$className} does not exists");
    }

}
