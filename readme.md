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

## Usage examples

### Always: Setting up

This applies to every following example and should be prepended to every example.

```php
$client = new \WeDesignIt\ParcelPro\Client(
    '<your login ID>'
    '<your API key>'
);
$parcelPro = new \WeDesignIt\ParcelPro\ParcelPro($client);
```

### Check if API key is valid

```php
$parcelPro->apiKey()->isValid();
```

### Retrieving the shipment types

```php
$parcelPro->shipmentType()->list();
```

Response example (from the docs):

```php
[
    [
        "Id" => 8,
        "Type" => "DFY",
        "Code" => "00",
        "Label" => "DFY",
        "Carrier_Id" => 2,
        "Carrier" => "DHL",
        "CarrierNaam" => "DHL",
        "CarrierLabel" => "",
        "CarrierKlantcode" => "1234567",
        "Buitenland" => 1,
        "Benelux" => 1,
        "EU" => null,
        "Worldwide" => null,
        "Land" => null,
        "Tolplichtig" => null,
        "InleverenOpServicePoint" => 1,
        "ServicePoint" => 1,
        "HandtekeningVoorOntvangst" => 1,
        "NietBijBuren" => 1,
        "AvondLevering" => null,
        "ZaterdagLevering" => null1,
        "1100Levering" => null,
        "VerhoogdAansprakelijk" => 1,
        "Rembours" => null,
        "MiniPallet" => null,
        "Pallet" => null,
        "Collo" => null
    ],
    [
        "Id" => 9,
        "Type" => "PostNL",
        "Code" => "3085",
        "Label" => "Standaard Pakket",
        "Carrier_Id" => 3,
        "Carrier" => "PostNL",
        "CarrierNaam" => "PostNL",
        "CarrierLabel" => "",
        "CarrierKlantcode" => "7654321",
        "Buitenland" => 0,
        "Benelux" => 0,
        "EU" => null,
        "Worldwide" => null,
        "Land" => null,
        "Tolplichtig" => null,
        "InleverenOpServicePoint" => null,
        "ServicePoint" => 1,
        "HandtekeningVoorOntvangst" => 1,
        "NietBijBuren" => 1,
        "AvondLevering" => null,
        "ZaterdagLevering" => null1,
        "1100Levering" => null,
        "VerhoogdAansprakelijk" => 1,
        "Rembours" => null,
        "MiniPallet" => null,
        "Pallet" => null,
        "Collo" => null
        ]
]
```

Which will then return a boolean value.

### Sending a shipment

```php 
$shipment = [
    'Carrier'            => 'Carrier name',
    'Type'               => 'Shipment type',
    'Referentie'         => 'E.g. your order number',
    'Zaterdaglevering'   => '1',
    'NaamAfzender'       => 'Michael Scott',
    'StraatAfzender'     => 'Street',
    'NummerAfzender'     => '11',
    'ToevoegingAfzender' => 'A',
    'PostcodeAfzender'   => '1000 AB',
    'PlaatsAfzender'     => 'Scranton',
    'LandAfzender'       => 'NL',
    'Naam'               => 'Dwight Schrute',
    'Straat'             => 'Street'
    'Nummer'             => '11',
    'Toevoeging'         => 'A',
    'Postcode'           => '1000 AB',
    'Plaats'             => 'Scranton',
    'Land'               => 'NL',
    'Email'              => 'assistant-regional-manager@dundermifflin.ext',
    'AantalPakketten'    => 1,
    'Gewicht'            => 1,
    'Opmerking'          => 'Thanks to the world\'s #1 boss',
];

$parcelPro->shipment()->create($shipment);
```

If you like a more object-oriented approach you can also use the [Shipment](src/Resources/Shipment.php) Resource 
class (and its [subclasses](src/Resources/Shipment)).

### Retrieving a shipping label

If needed for printing. Note you already get a label URL back from the shipment create call which you can also 
present to 
your users to directly access the label.

```php
// for PDF version
$label = $parcelPro->shippingLabel()->get($shipmentId);
// for HTML version
$pdf = false;
$label = $parcelPro->shippingLabel()->get($shipmentId, $pdf);
```