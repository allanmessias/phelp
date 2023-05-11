<?php
use Phelper\Command;

beforeEach(function () {
    $this->command = new Command('teste');
});

it("should add a command to the commandList and return true if it was added", function (CommandList $commandList) {
    $commandList->add($this->command);
    expect($commandList->has($this->command))->toBe(true);
})->with([
    fn() => new CommandList([new Command('help')])
]);

it("should return false if the command that was provided don't exist", function (CommandList $commandList) {
    expect($commandList->has(new Command("foo")))->toBe(false);
})->with([
    fn() => new CommandList([new Command('help')])
]);


class CommandList 
{   
    private array $commands; 

    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    public function has(Command $command): bool
    {
        return isset($this->commands[$command->getName()]); 
    }

    public function get(Command $command): Command | null
    {
        if($this->has($command)) return $command;
        return null;
    }

    public function add(Command $command)
    {
        $this->commands[$command->getName()] = $command;
    }
}