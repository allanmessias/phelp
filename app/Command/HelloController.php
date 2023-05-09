<?php

namespace App\Command;

use Lib\Phelper\CommandController;
use Lib\Contracts\Phelper\Runnable;

class HelloController extends CommandController implements Runnable
{
    public function run(string $argv)
    {
        $name = isset($argv[2]) ? $argv[2] : "World";
        $this->getApp()->getPrinter()->display("Hello $name");
    }
}
