<?php

namespace Safe\BlockChain\Safe;

use Safe\BlockChain\{
    AbstractEndpoint, Client
};

/**
 * Class Contract
 * @package Safe\BlockChain\Safe
 */
class Contract extends AbstractEndpoint
{
    protected const URL_PREFIX = 'safe/contract';

    /**
     * @return Client
     */
    public function getToken(): Client
    {
        return $this->sendGetRequest('token');
    }

    /**
     * @param string $walletAddress
     * @param string $walletPassword
     * @param string $walletKeystore
     * @param float $WAI
     * @return Client
     */
    public function buyToken(
        string $walletAddress,
        string $walletPassword,
        string $walletKeystore,
        float $WAI
    ): Client {
        return $this->sendPostRequest('token/buy', [
            'account' => $walletAddress,
            'privatePhrase' => $walletPassword,
            'privateJson' => $walletKeystore,
            'wai' => $WAI
        ]);
    }

    /**
     * @return Client
     */
    public function getTokenSupply(): Client
    {
        return $this->sendGetRequest('token/supply');
    }

    /**
     * @return Client
     */
    public function getTokenRate(): Client
    {
        return $this->sendGetRequest('token/rate');
    }

    /**
     * @return Client
     */
    public function getSaleInvestment(): Client
    {
        return $this->sendGetRequest('sale/investment');
    }

    /**
     * @return Client
     */
    public function getSaleDuration(): Client
    {
        return $this->sendGetRequest('sale/duration');
    }
}