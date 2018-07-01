<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 30.06.18
 * Time: 20:32
 */

namespace reflection\modules_system\Entities;

/**
 * Class Person
 */
class Person
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Person constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
