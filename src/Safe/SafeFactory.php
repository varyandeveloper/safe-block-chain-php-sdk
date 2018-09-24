<?php

namespace Safe\BlockChain\Safe;

use Safe\BlockChain\AbstractEndpointFactory;

/**
 * Class SafeFactory
 * @package Safe\BlockChain\Safe
 */
class SafeFactory extends AbstractEndpointFactory
{
    /**
     * Register class aliases
     *
     * @return void
     */
    protected function register()
    {
        class_alias(Contract::class, 'Contract');
    }
}