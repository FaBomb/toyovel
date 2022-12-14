<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3abf49603ad3053ef580d25b371adcc1
{
    public static $files = array (
        '11fff527f6a7e0e8120dbec984cfaaa5' => __DIR__ . '/..' . '/Framework/Illuminate/Foundation/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Routes\\' => 7,
        ),
        'I' => 
        array (
            'Illuminate\\' => 11,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Routes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routes',
        ),
        'Illuminate\\' => 
        array (
            0 => __DIR__ . '/..' . '/Framework/Illuminate',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3abf49603ad3053ef580d25b371adcc1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3abf49603ad3053ef580d25b371adcc1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3abf49603ad3053ef580d25b371adcc1::$classMap;

        }, null, ClassLoader::class);
    }
}
