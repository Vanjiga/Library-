<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6c9abc48c5d5cf1bf5fd61a4be8bd49d
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6c9abc48c5d5cf1bf5fd61a4be8bd49d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6c9abc48c5d5cf1bf5fd61a4be8bd49d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6c9abc48c5d5cf1bf5fd61a4be8bd49d::$classMap;

        }, null, ClassLoader::class);
    }
}
