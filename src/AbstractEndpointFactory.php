<?php

namespace Safe\BlockChain;

use Safe\BlockChain\Exception\SafeClientClassNotFoundException;

/**
 * Class AbstractEndpointFactory
 * @package Safe\BlockChain
 */
abstract class AbstractEndpointFactory
{
    /**
     * @param string $className
     * @param mixed ...$params
     * @return mixed
     * @throws SafeClientClassNotFoundException
     */
    public function __invoke(string $className, ...$params)
    {
        if (method_exists($this, 'register')) {
            $this->register();
        }
        $this->validateClass($className);
        return new $className(...$params);
    }

    /**
     * @param string $className
     * @throws SafeClientClassNotFoundException
     */
    private function validateClass(string $className)
    {
        if (!class_exists($className)) {
            throw new SafeClientClassNotFoundException(sprintf(
                'Class %s dose not exists',
                $className
            ));
        }
    }
}