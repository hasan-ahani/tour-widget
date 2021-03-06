<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf832008bd63fb8eb2be8989216bea3a1
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hasanart\\TourWidget\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hasanart\\TourWidget\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf832008bd63fb8eb2be8989216bea3a1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf832008bd63fb8eb2be8989216bea3a1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf832008bd63fb8eb2be8989216bea3a1::$classMap;

        }, null, ClassLoader::class);
    }
}
