<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc12527a8e44911f292a4cfc8b346312a
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

        spl_autoload_register(array('ComposerAutoloaderInitc12527a8e44911f292a4cfc8b346312a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc12527a8e44911f292a4cfc8b346312a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc12527a8e44911f292a4cfc8b346312a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
