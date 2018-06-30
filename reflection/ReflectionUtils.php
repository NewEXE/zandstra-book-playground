<?php

/**
 * Class ReflectionUtils
 */
class ReflectionUtils
{
    static function getClassSource(ReflectionClass $class)
    {
        return self::getSource($class);
    }

    static function getMethodSource(ReflectionMethod $method)
    {
        return self::getSource($method);
    }

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