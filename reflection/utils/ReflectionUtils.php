<?php

namespace reflection\utils;
use \ReflectionClass;
use \ReflectionMethod;
use \Reflector;

/**
 * Class ReflectionUtils
 */
class ReflectionUtils
{
    /**
     * @param ReflectionClass $class
     * @return bool|string
     */
    static function getClassSource(ReflectionClass $class)
    {
        return self::getSource($class);
    }

    /**
     * @param ReflectionMethod $method
     * @return bool|string
     */
    static function getMethodSource(ReflectionMethod $method)
    {
        return self::getSource($method);
    }

    /**
     * @param Reflector $reflector
     * @return bool|string
     */
    protected static function getSource(Reflector $reflector)
    {
        $path = $reflector->getFileName();
        $lines = @file($path);

        if (! $lines) return false;

        $firstLineNumber = $reflector->getStartLine();
        $lastLineNumber = $reflector->getEndLine();

        $length = $lastLineNumber - $firstLineNumber + 1;

        return implode('', array_slice($lines, $firstLineNumber - 1, $length));
    }
}