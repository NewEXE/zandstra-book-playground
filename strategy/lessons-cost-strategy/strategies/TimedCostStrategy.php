<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:51
 */

namespace strategy\lessons_cost_strategy\strategies;
use strategy\lessons_cost_strategy\lesson_types\Lesson;

/**
 * Class TimedCostStrategy
 * @package strategy\lessons_cost_strategy\strategies
 */
class TimedCostStrategy extends CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return float
     */
    public function cost(Lesson $lesson)
    {
        return (float) ($lesson->getDuration() * 5);
    }

    /**
     * @return string
     */
    public function chargeType()
    {
        return 'Duration (hourly) pay';
    }
}