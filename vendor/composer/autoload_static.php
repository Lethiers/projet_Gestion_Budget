<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit654b84fa357184a87cf56790a9f627cb
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit654b84fa357184a87cf56790a9f627cb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit654b84fa357184a87cf56790a9f627cb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit654b84fa357184a87cf56790a9f627cb::$classMap;

        }, null, ClassLoader::class);
    }
}
