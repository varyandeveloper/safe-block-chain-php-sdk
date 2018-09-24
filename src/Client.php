<?php

namespace Safe\BlockChain;

use Guzzle\Http\Message\Response;
use Safe\BlockChain\Exception\SafeClientBadMethodCallException;
use Safe\BlockChain\Ethereum\{
    EthereumFactory, Account
};
use Safe\BlockChain\Exchange\{
    ExchangeFactory, Callback
};
use Safe\BlockChain\Safe\{
    Contract, SafeFactory
};

/**
 * Class Client
 * @package Safe\BlockChain
 * @mixin \Guzzle\Http\Client
 */
class Client
{
    /**
     * @var EthereumFactory
     */
    protected $ethereum;

    /**
     * @var ExchangeFactory
     */
    protected $exchange;

    /**
     * @var SafeFactory
     */
    protected $safe;

    /**
     * @var \Guzzle\Http\Client
     */
    protected $httpClient;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var array
     */
    private static $initialized;

    /**
     * Client constructor.
     * @param \Guzzle\Http\Client $client
     */
    public function __construct(\Guzzle\Http\Client $client)
    {
        $this->httpClient = $client;
        $this->initEthereum();
        $this->initExchange();
        $this->initSafe();
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws SafeClientBadMethodCallException
     */
    public function __call(string $name, array $arguments)
    {
        if (!method_exists($this->httpClient, $name)) {
            throw new SafeClientBadMethodCallException(sprintf(
                'Class %s dose not have %s method',
                get_class($this),
                $name
            ));
        }

        return $this->httpClient->{$name}(...$arguments);
    }

    /**
     * @param Response|null $response
     * @return Client
     */
    public function setResponse(?Response $response): self
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        if (null !== $this->response)
        {
            return json_decode($this->response->getBody(), true);
        }

        return [];
    }

    /**
     * Use Ethereum endpoints
     *
     * @param string $class
     * @return Account
     */
    public function ethereum(string $class)
    {
        return $this->getEndpoint(__FUNCTION__, $class);
    }

    /**
     * Use Exchange endpoints
     *
     * @param string $class
     * @return Callback
     */
    public function exchange(string $class)
    {
        return $this->getEndpoint(__FUNCTION__, $class);
    }

    /**
     * Use Safe endpoints
     *
     * @param string $class
     * @return Contract
     */
    public function safe(string $class)
    {
        return $this->getEndpoint(__FUNCTION__, $class);
    }

    /**
     * @param string $property
     * @param string $class
     * @return mixed
     */
    protected function getEndpoint(string $property, string $class)
    {
        if (empty(static::$initialized[$class])) {
            static::$initialized[$class] = call_user_func($this->{$property}, $class, $this);
        }

        return static::$initialized[$class];
    }

    /**
     * @return void
     */
    protected function initEthereum(): void
    {
        $this->ethereum = new EthereumFactory;
    }

    /**
     * @return void
     */
    protected function initExchange(): void
    {
        $this->exchange = new ExchangeFactory;
    }

    /**
     * @return void
     */
    protected function initSafe(): void
    {
        $this->safe = new SafeFactory;
    }
}