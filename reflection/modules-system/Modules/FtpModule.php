<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 30.06.18
 * Time: 20:36
 */

namespace reflection\modules_system\Modules;

class FtpModule implements Module
{
    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $user;

    public function __construct()
    { }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed|void
     */
    public function execute()
    {
        // TODO: Implement execute() method.

        echo 'FtpModule was executed with data: ';
        var_dump($this);
        echo '<br />';
    }
}