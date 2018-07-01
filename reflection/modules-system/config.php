<?php
/**
 * Created by PhpStorm.
 * User: newexe
 * Date: 30.06.18
 * Time: 23:01
 */

use reflection\modules_system\Modules\PersonModule;
use reflection\modules_system\Modules\FtpModule;

return [
    PersonModule::class => [
        'person' => 'Valera'
    ],
    FtpModule::class => [
        'host' => 'localhost',
        'user' => 'NewEXE'
    ],
];