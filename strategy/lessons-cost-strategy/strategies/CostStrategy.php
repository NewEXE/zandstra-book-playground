<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:16
 */

/**
 * Class CostStrategy
 */
abstract class CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return float
     */
    abstract function cost(Lesson $lesson);

    /**
     * @return string
     */
    abstract function chargeType();
}