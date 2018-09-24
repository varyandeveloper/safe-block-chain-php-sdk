<?php
/**
 * Created by IntelliJ IDEA.
 * User: user
 * Date: 9/14/2018
 * Time: 9:29 PM
 */

namespace Safe\BlockChain\Exchange;

use Safe\BlockChain\AbstractEndpointFactory;

/**
 * Class ExchangeFactory
 * @package Safe\BlockChain\Exchange
 */
class ExchangeFactory extends AbstractEndpointFactory
{
    /**
     * Register class aliases
     *
     * @return void
     */
    protected function register()
    {
        class_alias(Callback::class, 'Callback');
    }
}