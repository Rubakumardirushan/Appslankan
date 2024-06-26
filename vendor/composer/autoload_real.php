<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3800e0e617db01e26af6c65fc67c849e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit3800e0e617db01e26af6c65fc67c849e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3800e0e617db01e26af6c65fc67c849e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3800e0e617db01e26af6c65fc67c849e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
