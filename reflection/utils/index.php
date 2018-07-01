<?php

require_once '../../autoloader.php';

/**
 * Class Test
 */
class Test
{
    public function pub()
    { }

    protected function prot()
    { }

    private function priv()
    { }
}

$rClass = new ReflectionClass(Test::class);
$rMethods = $rClass->getMethods();

echo '<pre>';

echo ReflectionUtils::getClassSource($rClass);

foreach ($rMethods as $method) {
    echo ReflectionUtils::getMethodSource($method);
}
echo '</pre>';