<?php

namespace Safe\BlockChain\Exchange;

use Safe\BlockChain\{
    AbstractEndpoint, Client, Exception\SafeClientBadMethodCallException
};

/**
 * Class Callback
 * @package Safe\BlockChain\Exchange
 * @method Client exchangeLTCT(string $walletAddress)
 * @method Client exchangeLTC(string $walletAddress)
 * @method Client exchangeXRP(string $walletAddress)
 */
class Callback extends AbstractEndpoint
{
    protected const URL_PREFIX = 'exchange/callback';

    /**
     * @var array
     */
    protected static $validExchanges = ['LTCT', 'LTC', 'XRP'];

    /**
     * @param string $name
     * @param array $arguments
     * @return Client
     * @throws SafeClientBadMethodCallException
     */
    public function __call(string $name, array $arguments): Client
    {
        $suffix = strtoupper(str_replace('exchange', '', $name));
        if (!in_array($suffix, static::$validExchanges, true)) {
            throw new SafeClientBadMethodCallException(sprintf(
                'Class %s dose not have %s method',
                $suffix
            ));
        }

        $arguments[] = $suffix;
        return $this->doExchange(...$arguments);
    }

    /**
     * @param string $walletAddress
     * @return Client
     */
    public function sendIPN(string $walletAddress): Client
    {
        return $this->sendPostRequest('ipn', compact('walletAddress'));
    }

    /**
     * @return array
     */
    public static function getValidExchanges(): array
    {
        return static::$validExchanges;
    }

    /**
     * @param string $walletAddress
     * @param string $value
     * @return Client
     */
    protected function doExchange(string $walletAddress, string $value): Client
    {
        $request = $this->blockChainClient->get(sprintf(
            '%s/%s/%s',
            static::URL_PREFIX,
            $walletAddress,
            $value
        ));

        return $this->blockChainClient->setResponse($request->getResponse());
    }
}