<?php

require 'vendor/autoload.php';

use CrazyMesut\Marketplace\MarketplaceFactory;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$options = [
    'sellerId' => $_ENV['TRENDYOL_SELLER_ID'],
    'apiKey' => $_ENV['TRENDYOL_API_KEY'],
    'apiSecret' => $_ENV['TRENDYOL_API_SECRET']
];

$marketplace = MarketplaceFactory::createMp('Trendyol', $options);
$service = $marketplace->createService('OrderService');

$options = ['page' => 0, 'size' => 200,];
$orders = $service->getOrders($options)->getResponse();

// $updateTrackingNumberStatusCode = $service->updateTrackingNumber($shipmentPackageId,$trackingNumber);

print_r($orders);

