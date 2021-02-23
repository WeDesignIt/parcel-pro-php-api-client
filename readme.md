# Parcel Pro API client

## Installing

```
composer require wedesignit/parcel-pro-php-api-client
```

## Creating the connector

```php
$client = new \WeDesignIt\ParcelPro\Client($userId, $apiKey);
$parcelPro = new \WeDesignIt\ParcelPro\ParcelPro($client);
```

After this, the `$parcelPro` class can return `Endpoints` which can be called.

The endpoint methods can either be called with plain arrays or the fluent
`Resource` classes can be used.
