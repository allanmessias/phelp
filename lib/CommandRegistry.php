<?php

namespace Phelper;

use Closure;
use Exception;
use Phelper\CommandController;
use Phelper\Command;

class CommandRegistry
{
    protected array $commands = [];
    protected array $controllers = [];

    public function registerController(Command $command, CommandController $controller): void
    {
        $this->controllers = [$command->getName() => $controller];
    }

    public function register(Command $command, callable $callable): void
    {
        $this->commands[$command->getName()] = $callable;
    }

    public function getCommand(string|Command $command): Command | null | Closure
    {   
        if($this->commands[$command] instanceof Closure) {
            $this->resolve($this->commands[$command]);
        }
        return isset($this->commands[$command]) ? $this->commands[$command] : null;
    }

    public function resolve (callable $closure)
    {
        $closure($this->commands);
    }

    public function getController(string|Command $command): ?CommandController
    {
        return isset($this->controllers[$command]) ? $this->controllers[$command] : null;
    }

    public function getCallable(Command $command): Command | array
    {
        $controller = $this->getController($command->getName());
    
        if ($controller) {
            return [$controller, 'run'];
        }

        $command = $this->getCommand($command->getName());
  
        if ($command === null) {
            throw new Exception("Command \"$command\" not found.");
        }

        return $command;
    }
}
