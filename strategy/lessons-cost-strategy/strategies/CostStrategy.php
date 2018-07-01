<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:16
 */

namespace strategy\lessons_cost_strategy\strategies;
use strategy\lessons_cost_strategy\lesson_types\Lesson;

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