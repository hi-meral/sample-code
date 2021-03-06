<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b908f3b2fb8f4e15c61725b6202a8c0
{
    public static $files = array (
        'fad373d645dd668e85d44ccf3c38fbd6' => __DIR__ . '/..' . '/guzzlehttp/streams/src/functions.php',
        '6bc45d0537e6858fd179bdbc31d62c79' => __DIR__ . '/..' . '/raveren/kint/Kint.class.php',
        '154e0d165f5fe76e8e9695179d0a7345' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Stream\\' => 18,
            'GuzzleHttp\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'GuzzleHttp\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/streams/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/process',
            ),
        ),
        'F' => 
        array (
            'FFMpeg' => 
            array (
                0 => __DIR__ . '/..' . '/php-ffmpeg/php-ffmpeg/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9b908f3b2fb8f4e15c61725b6202a8c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9b908f3b2fb8f4e15c61725b6202a8c0::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9b908f3b2fb8f4e15c61725b6202a8c0::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
