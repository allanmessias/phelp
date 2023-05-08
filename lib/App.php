<?php 

namespace Phelper;
use Phelper\CliPrinter;

class App
{
    protected CliPrinter $printer;
    protected CommandRegistry $registry;

    public function __construct() 
    {
        $this->printer = new CliPrinter();
        $this->registry = new CommandRegistry();
    }

    public function registerCommand(string $name, callable $callable): void
    {
        $this->registry->register($name, $callable);
    }

    public function getPrinter()
    {
        return $this->printer;
    }


    public function runCommand(array $argv = []): void
    {
        $command_name = "World";
        if(isset($argv[1])) {
            $command_name = $argv[1];
        }

        $command = $this->registry->get($command_name);
        if($command === null) {
            $this->printer->display("ERROR: Command \"$command_name\" not found");
            exit;
        }

        call_user_func($command, $argv);
    }
}



