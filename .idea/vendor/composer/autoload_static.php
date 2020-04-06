<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c922f8f7304f0a25cb1bf834f7d3591
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
        'P' => 
        array (
            'PM_Engine\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
        'PM_Engine\\' => 
        array (
            0 => __DIR__ . '/..' . '/pmcore/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1c922f8f7304f0a25cb1bf834f7d3591::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1c922f8f7304f0a25cb1bf834f7d3591::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
