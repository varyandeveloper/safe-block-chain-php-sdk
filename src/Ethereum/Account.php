<?php

namespace Safe\BlockChain\Ethereum;

use Safe\BlockChain\{
    AbstractEndpoint, Client
};

/**
 * Class Account
 * @package Safe\BlockChain\Ethereum
 */
class Account extends AbstractEndpoint
{
    protected const URL_PREFIX = 'ethereum/account';

    /**
     * @param string $password
     * @return Client
     */
    public function sendWalletPassword(string $password): Client
    {
        return $this->sendPostRequest('', compact('password'));
    }

    /**
     * @param string $walletAddress
     * @return Client
     */
    public function getBalanceAll(string $walletAddress): Client
    {
        return $this->sendGetRequest(sprintf('balance/all/%s', $walletAddress));
    }
}