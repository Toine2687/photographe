<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit241f99e9b88dc956332d3abb18c52d73
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit241f99e9b88dc956332d3abb18c52d73::$classMap;

        }, null, ClassLoader::class);
    }
}