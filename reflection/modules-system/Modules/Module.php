<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 30.06.18
 * Time: 20:33
 */

/**
 * Interface Module
 *
 * All setters in implemented modules
 * must be with ONLY one parameter
 * and starts with 'set' prefix.
 * Ex.: setName($name)
 * Module's constructor must be
 * without parameters.
 */
interface Module
{
    /**
     * Module constructor.
     */
    public function __construct();

    /**
     * @return mixed
     */
    public function execute();
}