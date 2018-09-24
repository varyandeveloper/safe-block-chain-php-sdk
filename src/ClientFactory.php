<?php

namespace Safe\BlockChain;

/**
 * Class ClientFactory
 * @package Safe\BlockChain
 */
class ClientFactory
{
    /**
     * @param string $url
     * @param string $userId
     * @param string $userToken
     * @return Client
     */
    public function __invoke(string $url, string $userId, string $userToken)
    {
        $httpClient = new \Guzzle\Http\Client($url, [
            'headers' => [
                'X-User-Id'=> $userId,
                'X-Auth-Token' => $userToken
            ]
        ]);
        return new Client($httpClient);
    }
}