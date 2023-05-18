<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46858cd76bf603e41d2966cd7a03a26b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46858cd76bf603e41d2966cd7a03a26b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46858cd76bf603e41d2966cd7a03a26b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit46858cd76bf603e41d2966cd7a03a26b::$classMap;

        }, null, ClassLoader::class);
    }
}
