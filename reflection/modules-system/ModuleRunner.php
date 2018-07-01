<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 30.06.18
 * Time: 20:43
 */


/**
 * Class ModuleRunner
 */
class ModuleRunner
{
    /**
     * @var Module[] Array of registered modules
     */
    protected $modules = [];

    /**
     * @var array
     */
    private $configData = [];

    /**
     * ModuleRunner constructor.
     * @throws ReflectionException
     */
    public function __construct()
    {
        /*
         * In real application this data comes from
         * database, XML, text file or other data source
         */
        $this->configData = require 'config.php';

        $this->init();
    }

    /**
     * @return void
     */
    public function run()
    {
        foreach ($this->modules as $module) {
            $module->execute();
        }
    }

    /**
     * @throws ReflectionException
     */
    protected function init()
    {
        $interface = new ReflectionClass(Module::class);

        foreach ($this->configData as $moduleName => $params) {
            $moduleClass = new ReflectionClass($moduleName);

            if (! $moduleClass->isSubclassOf($interface)) {
                throw new Exception('Unknown module type: ' . $moduleName);
            }

            $module = $moduleClass->newInstance();
            $moduleMethods = $moduleClass->getMethods();

            foreach ($moduleMethods as $method) {
                $this->handleMethod($module, $method, $params);
            }

            $this->modules[] = $module;
        }
    }

    /**
     * @param Module $module
     * @param ReflectionMethod $method
     * @param $params
     * @return bool
     */
    protected function handleMethod(Module $module, ReflectionMethod $method, $params)
    {
        $name = $method->getName();
        $args = $method->getParameters();

        if (count($args) !== 1 || substr($name, 0, 3) !== 'set') {
            return false;
        }

        $property = strtolower(substr($name, 3));

        if (! isset($params[$property])) {
            return false;
        }

        $argClass = $args[0]->getClass();

        if (empty($argClass)) {
            $method->invoke($module, $params[$property]);
        } else {
            $method->invoke($module, $argClass->newInstance($params[$property]));
        }
    }
}