<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit224b64ee5e2459cfd557f3444db45270
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Finder\\' => 25,
        ),
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
        'G' => 
        array (
            'Gregwar\\' => 8,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
        'Gregwar\\' => 
        array (
            0 => __DIR__ . '/..' . '/gregwar/captcha/src/Gregwar',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit224b64ee5e2459cfd557f3444db45270::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit224b64ee5e2459cfd557f3444db45270::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
