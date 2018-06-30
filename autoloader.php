<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 30.06.18
 * Time: 21:55
 */

/*
 * Walk through all PHP files in project
 * until the needed file is found
 */
spl_autoload_register(function ($className) {
    $requiredFileName = "$className.php";

    $dir = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator(__DIR__, FilesystemIterator::SKIP_DOTS),
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
});
