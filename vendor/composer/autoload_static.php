<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite00499e9783d54e9d0620f8262415a1e
{
    public static $files = array (
        '6124b4c8570aa390c21fafd04a26c69f' => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy/deep_copy.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
        'l' => 
        array (
            'libphonenumber\\' => 15,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Mpdf\\' => 5,
        ),
        'G' => 
        array (
            'Giggsey\\Locale\\' => 15,
        ),
        'D' => 
        array (
            'DeepCopy\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
        'libphonenumber\\' => 
        array (
            0 => __DIR__ . '/..' . '/giggsey/libphonenumber-for-php/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Mpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/mpdf/src',
        ),
        'Giggsey\\Locale\\' => 
        array (
            0 => __DIR__ . '/..' . '/giggsey/locale/src',
        ),
        'DeepCopy\\' => 
        array (
            0 => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite00499e9783d54e9d0620f8262415a1e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite00499e9783d54e9d0620f8262415a1e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite00499e9783d54e9d0620f8262415a1e::$classMap;

        }, null, ClassLoader::class);
    }
}