<?php

namespace App\Command;

use Phelper\CommandController;
use Phelper\Contracts\Runnable;

class HelloController extends CommandController implements Runnable
{
    public function run(array $argv)
    {
        $name = isset($argv[2]) ? $argv[2] : "World";
        $this->getApp()->getPrinter()->display("Hello $name");
    }
}
