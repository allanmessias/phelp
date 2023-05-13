<?php

namespace Phelper;
use Phelper\Command;
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