# Trendyol Marketplace API Integration

This project demonstrates how to integrate with the **Trendyol Marketplace API** using the `CrazyMesut\Marketplace` package.

## Installation

1. Clone the repository:
    ```bash
    git clone <repository-url>
    cd <repository-folder>
    ```

2. Install the required dependencies using Composer:
    ```bash
    composer install
    ```

3. Create a `.env` file in the project root and add the following environment variables:

    ```env
    TRENDYOL_SELLER_ID=your_seller_id
    TRENDYOL_API_KEY=your_api_key
    TRENDYOL_API_SECRET=your_api_secret
    ```

## Usage

You can use the provided script to fetch orders from Trendyol's API. Here's an example:

```php
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

$options = ['page' => 0, 'size' => 200];
$orders = $service->getOrders($options)->getResponse();

// Uncomment the line below to update tracking number
// $updateTrackingNumberStatusCode = $service->updateTrackingNumber($shipmentPackageId, $trackingNumber);

print_r($orders);
