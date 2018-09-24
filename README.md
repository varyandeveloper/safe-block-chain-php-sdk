#Safe Block Chain PHP SDK

This package makes it simple to integrate your application with Safe Block Chain API.

#Requirements

* PHP >= 7.2
* Composer package management
* Guzzle\Http >= 3.9

#Installation

* Clone repository or require package with Composer package (composer require safe/block-chain-php-sdk)
* Run composer install

#Usage

* Initialize Block Chain client with factory

```php
    /**
     * @var \Safe\BlockChain\Client $client
     */
    $client = (new \Safe\BlockChain\ClientFactory())(
        API_BASE_URL,
        USER_ID,
        USER_TOKEN
    );

    //Work with ethereum/account endpoint
    $client->ethereum('Account');
    
    //Work with safe/contract endpoint
    $client->safe('Contract');
    
    //Work with exchange/callback endpoint
    $client->exchange('Callback');

```

#Version

* 1.0.0

#Authors

* Varazdat Stepanyan