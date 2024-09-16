<?php

require 'vendor/autoload.php';

use CrazyMesut\Marketplace\MarketplaceFactory;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// trendyol example 1
$factory = new MarketplaceFactory('Trendyol');
$marketplace = $factory->setSellerId($_ENV['TRENDYOL_SELLER_ID'])
    ->setApiKey($_ENV['TRENDYOL_API_KEY'])
    ->setApiSecret($_ENV['TRENDYOL_API_SECRET'])
    ->createMarketplace();

// trendyol example 2
$factory = new MarketplaceFactory('Trendyol', [
    'sellerId' => $_ENV['TRENDYOL_SELLER_ID'],
    'apiKey' => $_ENV['TRENDYOL_API_KEY'],
    'apiSecret' => $_ENV['TRENDYOL_API_SECRET']
]);
$marketplace = $factory->createMarketplace();

// hepsiburada example 1
$factory = new MarketplaceFactory('Hepsiburada');
$marketplace = $factory->setUsername($_ENV['HEPSIBURADA_USERNAME'])
    ->setPassword($_ENV['HEPSIBURADA_PASSWORD'])
    ->setMerchantId($_ENV['HEPSIBURADA_MERCHANT_ID'])
    ->createMarketplace();

// hepsiburada example 2
$factory = new MarketplaceFactory('Trendyol', [
    'username' => $_ENV['HEPSIBURADA_USERNAME'],
    'password' => $_ENV['HEPSIBURADA_PASSWORD'],
    'merchantId' => $_ENV['HEPSIBURADA_MERCHANT_ID']
]);
$marketplace = $factory->createMarketplace();



exit();

$marketplaceName = 'Trendyol';
$marketplaceName = 'Hepsiburada';

$marketplace = MarketplaceFactory::createMp($marketplaceName, $options[$marketplaceName]);
$service = $marketplace->createService('OrderService');

$options = ['page' => 0, 'size' => 200,];
$orders = $service->getOrders($options)->getResponse();

// $updateTrackingNumberStatusCode = $service->updateTrackingNumber($shipmentPackageId,$trackingNumber);

print_r($orders);

