<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita7b65107dd7d6a3f4d949cf82cbea94b
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInita7b65107dd7d6a3f4d949cf82cbea94b::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInita7b65107dd7d6a3f4d949cf82cbea94b::$classMap;

        }, null, ClassLoader::class);
    }
}
