<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 06.07.18
 * Time: 0:59
 */

namespace compound_property;

/**
 * Class Person
 * @package compound_property
 */
class Person
{
    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * Person constructor.
     * @param string $firstnameOrFullname Firstname or Fullname
     * @param string|null $lastname Lastname or null
     */
    public function __construct($firstnameOrFullname, $lastname = null)
    {
        if (is_null($lastname)) {
            $this->fullname = $firstnameOrFullname;
        } else {
            $this->firstname = $firstnameOrFullname;
            $this->lastname = $lastname;
        }
    }

    /**
     * @param $property
     * @param $value
     * @throws \Exception
     */
    public function __set($property, $value)
    {
        if ($property === 'fullname') {
            if ($explodedFullname = $this->explodeFullname($value)) {
                $this->firstname = $explodedFullname['firstname'];
                $this->lastname = $explodedFullname['lastname'];
            } else {
                throw new \Exception("Error in full name: '{$value}'");
            }
        }
    }

    /**
     * @param $property
     * @return string
     */
    public function __get($property)
    {
        if ($property === 'fullname') {
            return $this->implodeFullname();
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->fullname;
    }

    /**
     * @param $maybeFullname
     * @return array|bool
     */
    private function explodeFullname($maybeFullname)
    {
        $exploded = explode($this->getFullnameSeparator(), $maybeFullname);

        if (count($exploded) === 2) {
            return [
                'firstname' => $exploded[0],
                'lastname' => $exploded[1],
            ];
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    private function implodeFullname()
    {
        $exploded = [
            $this->firstname,
            $this->lastname
        ];

        $imploded = implode($this->getFullnameSeparator(), $exploded);

        return $imploded;
    }

    /**
     * @return string
     */
    private function getFullnameSeparator() {
        return ' ';
    }
}