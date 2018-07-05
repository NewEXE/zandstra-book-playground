<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 06.07.18
 * Time: 1:00
 */

namespace compound_property;

$person1 = new Person('John', 'Smith');
$person2 = new Person('Mary Jane');

var_dump($person1->fullname, $person2);