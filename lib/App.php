<?php

namespace Phelper;

use Exception;
use Phelper\CliPrinter;
use Phelper\CommandRegistry;

class App
{
    protected CliPrinter $printer;
    protected CommandRegistry $registry;

    public function __construct()
    {
        $this->printer = new CliPrinter();
        $this->registry = new CommandRegistry();
    }

    public function registerController($name, CommandController $controller): void
    {
        $this->registry->registerController($name, $controller);
    }

    public function registerCommand(string $name, callable $callable): void
    {
        $this->registry->register($name, $callable);
    }

    public function getPrinter(): CliPrinter
    {
        return $this->printer;
    }

    public function runCommand(array $argv = [], string $defaultCommand = 'help'): void
    {
        $command = $defaultCommand;
        if (isset($argv[1])) {
            $command = $argv[1];
        }

        try {
            call_user_func($this->registry->getCallable($command), $argv);
        } catch (Exception $e) {
            $this->getPrinter()->display("ERROR " . $e->getMessage());
            exit;
        }
    }
}
