<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:15
 */

namespace strategy\lessons_cost_strategy\lesson_types;

/**
 * Class Seminar
 */
class Seminar extends Lesson
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'Seminar';
    }
}