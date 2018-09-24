<?php

namespace Safe\BlockChain\Ethereum;

use Safe\BlockChain\AbstractEndpointFactory;

/**
 * Class EthereumFactory
 * @package Safe\BlockChain\Ethereum
 */
class EthereumFactory extends AbstractEndpointFactory
{
    /**
     * Register class aliases
     *
     * @return void
     */
    protected function register()
    {
        class_alias(Account::class, 'Account');
    }
}