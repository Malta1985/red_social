<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbf133a1d818acb2a621f5966631638eb
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Malta\\RedSocial\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Malta\\RedSocial\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbf133a1d818acb2a621f5966631638eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbf133a1d818acb2a621f5966631638eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbf133a1d818acb2a621f5966631638eb::$classMap;

        }, null, ClassLoader::class);
    }
}
