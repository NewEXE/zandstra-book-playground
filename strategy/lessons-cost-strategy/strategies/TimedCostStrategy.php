<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:51
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