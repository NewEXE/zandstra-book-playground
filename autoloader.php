<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 30.06.18
 * Time: 21:55
 */

/**
 * Find needed file by namespace of class.
 * Char '_' in namespace will be converted to '-'.
 *
 * @param $className
 */
function namespaceAutoload($className)
{
    if (preg_match('/\\\\/', $className)) {

        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        $path = "{$className}.php";

        $path = str_replace('_', '-', $path);

        $path = ROOT . '/' . $path;

        if (file_exists($path)) {
            require_once $path;
        }
    }
}

/**
 * Walk through all PHP files in project
 * until the needed file is found
 *
 * @param $className
 */
function allFilesWalkerAutoload($className)
{
    $explodedClassName = explode('\\', $className);
    $requiredFileName = end($explodedClassName) . '.php';
    unset($explodedClassName);

    $dir = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator(ROOT, FilesystemIterator::SKIP_DOTS),
        true);

    /** @var SplFileInfo $file */
    foreach ($dir as $file)
    {
        if ($file->isDir() ||                   // exclude dirs
            $file->getExtension() !== 'php' ||  // exclude non-php files
            $file->getPathname() === __FILE__   // exclude current file
        ) {
            continue;
        }

        if ($file->getFilename() === $requiredFileName) {
            require_once $file->getPathname();
            break;
        }
    }
}

spl_autoload_register('namespaceAutoload');
spl_autoload_register('allFilesWalkerAutoload');
