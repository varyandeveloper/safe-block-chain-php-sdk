<?php

require_once __DIR__ . './vendor/autoload.php';

/**
 * @var \Safe\BlockChain\Client $client
 */
$client = (new \Safe\BlockChain\ClientFactory())(
    'url',
    'client_id',
    'client_token'
);

$account = $client->ethereum(Account::class);


$account->account();

echo '<pre>';
print_r($res->toArray());
echo '</pre>';

exit(0);