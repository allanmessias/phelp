<?php

namespace Phelper;

use Exception;
use Phelper\CliPrinter;
use Phelper\CommandRegistry;
use Phelper\Command;

class App
{
    protected CliPrinter $printer;
    protected CommandRegistry $registry;

    public function __construct()
    {
        $this->printer = new CliPrinter();
        $this->registry = new CommandRegistry();
    }

    public function registerController(Command $command, CommandController $controller): void
    {
        $this->registry->registerController($command, $controller);
    }

    public function registerCommand(Command $command, callable $callable): void
    {
        $this->registry->register($command, $callable);
    }

    public function getPrinter(): CliPrinter
    {
        return $this->printer;
    }

    public function runCommand(array $argv = [], Command $defaultCommand = new Command('help')): void
    {
        $command = $defaultCommand;
        isset($argv[1]) ? $command = new Command($argv[1]) : null;
        
        try {
            call_user_func($this->registry->getCallable($command), $argv);
        } catch (Exception $e) {
            $this->getPrinter()->display("ERROR " . $e->getMessage());
            exit;
        }
    }
}
