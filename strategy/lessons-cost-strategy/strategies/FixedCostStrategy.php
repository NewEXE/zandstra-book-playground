<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:54
 */

namespace strategy\lessons_cost_strategy\strategies;
use strategy\lessons_cost_strategy\lesson_types\Lesson;
/**
 * Class FixedCostStrategy
 */
class FixedCostStrategy extends CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return float
     */
    public function cost(Lesson $lesson)
    {
        return 30.0;
    }

    /**
     * @return string
     */
    public function chargeType()
    {
        return 'Fixed price';
    }
}