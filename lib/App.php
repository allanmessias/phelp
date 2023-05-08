<?php 

namespace Phelper;
use Phelper\CliPrinter;

class App
{
    protected CliPrinter $printer;
    protected array $registry = [];

    public function __construct() 
    {
        $this->printer = new CliPrinter();
    }

    public function registerCommand(string $name, callable $callable): void
    {
        $this->registry[$name] = $callable;
    }

    public function getPrinter()
    {
        return $this->printer;
    }

    public function getCommand(string $command)
    {
        return isset($this->registry[$command]) ? $this->registry[$command] : null;
    }

    public function runCommand(array $argv = []): void
    {
        $command_name = "World";
        if(isset($argv[1])) {
            $command_name = $argv[1];
        }

        $command = $this->getCommand($command_name);
        if($command === null) {
            $this->printer->display("ERROR: Command \"$command_name\" not found");
            exit;
        }

        call_user_func($command, $argv);
    }
}



