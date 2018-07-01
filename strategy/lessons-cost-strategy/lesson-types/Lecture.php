<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:15
 */

namespace strategy\lessons_cost_strategy\lesson_types;

/**
 * Class Lecture
 */
class Lecture extends Lesson
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'Lecture';
    }
}