<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:11
 */

/**
 * Class Lesson
 */
abstract class Lesson
{
    /**
     * @var int
     */
    private $duration;

    /**
     * @var CostStrategy
     */
    private $costStrategy;

    /**
     * Lesson constructor.
     * @param $duration
     * @param CostStrategy $strategy
     */
    public function __construct($duration, CostStrategy $strategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return float
     */
    public function cost()
    {
        return $this->costStrategy->cost($this);
    }

    /**
     * @return string
     */
    public function chargeType()
    {
        return $this->costStrategy->chargeType();
    }

    /**
     * @return string
     */
    abstract function getType(); //todo late static binding?
}