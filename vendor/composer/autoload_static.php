<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit00f9acbcf85ba1902f4c7c56dc5612e0
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Contracts\\' => 18,
            'Symfony\\Component\\EventDispatcher\\' => 34,
            'Safe\\BlockChain\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/contracts',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Safe\\BlockChain\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'G' => 
        array (
            'Guzzle\\Stream' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/stream',
            ),
            'Guzzle\\Parser' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/parser',
            ),
            'Guzzle\\Http' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/http',
            ),
            'Guzzle\\Common' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/common',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit00f9acbcf85ba1902f4c7c56dc5612e0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit00f9acbcf85ba1902f4c7c56dc5612e0::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit00f9acbcf85ba1902f4c7c56dc5612e0::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}