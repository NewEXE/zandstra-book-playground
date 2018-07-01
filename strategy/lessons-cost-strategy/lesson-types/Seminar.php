<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 01.07.18
 * Time: 16:15
 */

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