<?php

namespace Safe\BlockChain;

/**
 * Class AbstractEndpoint
 * @package Safe\BlockChain
 */
abstract class AbstractEndpoint
{
    protected const URL_PREFIX = '';

    /**
     * @var Client
     */
    protected $blockChainClient;

    /**
     * AbstractEndpoint constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->blockChainClient = $client;
    }

    /**
     * @param string $url
     * @param array|null $headers
     * @param array $options
     * @return Client
     */
    protected function sendGetRequest(string $url, array $headers = null, $options = []): Client
    {
        $request = $this->blockChainClient->get(sprintf(
            '%s/%s',
            static::URL_PREFIX,
            $url
        ), $headers, $options);

        return $this->blockChainClient->setResponse($request->getResponse());
    }

    /**
     * @param string $url
     * @param array $body
     * @param array|null $headers
     * @param array $options
     * @return Client
     */
    protected function sendPostRequest(string $url, array $body, array $headers = null, $options = []): Client
    {
        $request = $this->blockChainClient->post(sprintf(
            '%s/%s',
            static::URL_PREFIX,
            $url
        ), $headers, $body, $options);

        return $this->blockChainClient->setResponse($request->getResponse());
    }

    /**
     * @param string $url
     * @param array $body
     * @param array|null $headers
     * @param array $options
     * @return Client
     */
    protected function sendPatchRequest(string $url, array $body, array $headers = null, array $options = []): Client
    {
        $request = $this->blockChainClient->patch(sprintf(
            '%s/%s',
            static::URL_PREFIX,
            $url
        ), $headers, $body, $options);

        return $this->blockChainClient->setResponse($request->getResponse());
    }

    /**
     * @param string $url
     * @param array $body
     * @param array|null $headers
     * @param array $options
     * @return Client
     */
    protected function sendPutRequest(string $url, array $body, array $headers = null, array $options = []): Client
    {
        $request = $this->blockChainClient->patch(sprintf(
            '%s/%s',
            static::URL_PREFIX,
            $url
        ), $headers, $body, $options);

        return $this->blockChainClient->setResponse($request->getResponse());
    }
}