<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3800e0e617db01e26af6c65fc67c849e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Appslankan\\Forum\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Appslankan\\Forum\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3800e0e617db01e26af6c65fc67c849e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3800e0e617db01e26af6c65fc67c849e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3800e0e617db01e26af6c65fc67c849e::$classMap;

        }, null, ClassLoader::class);
    }
}
