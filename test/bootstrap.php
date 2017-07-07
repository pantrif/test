<?php

require dirname(__DIR__) . '/vendor/autoload.php';




function testClassLoader($className)
{
    $pathPrefix = dirname(__FILE__).'/';
    $classPath = str_replace('\\', '/', $className).'.php';

    $filename = $pathPrefix.$classPath;

    if (file_exists($filename)) {
        require_once $filename;
        if (class_exists($className)) {
            return true;
        }
    }

    return false;
}

// Register our own namespace autoloader and then the one provided by composer
spl_autoload_register('testClassLoader');

echo "begin test.....\n";
