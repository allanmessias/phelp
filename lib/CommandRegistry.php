<?php

namespace Lib\Phelper;

use Exception;
use Lib\Phelper\CommandController;

class CommandRegistry
{
    protected array $registry = [];
    protected array $controllers = [];


    public function registerController(string $command, CommandController $controller): void
    {
        $this->controllers = [$command => $controller];
    }

    public function register(string $name, callable $callable): void
    {
        $this->registry[$name] = $callable;
    }

    public function get(string $command)
    {
        return isset($this->registry[$command]) ? $this->registry[$command] : null;
    }

    public function getController(string $command): CommandController
    {
        return isset($this->controllers[$command]) ? $this->controllers[$command] : null;
    }

    public function getCallable(string $command)
    {
        $controller = $this->getController($command);
        if (!$controller) {
            throw new Exception("Controller not found.");
        }

        return [$controller, 'run'];

        $command = $this->get($command);
        if ($command === null) {
            throw new Exception("Command \"$command\" not found.");
        }

        return $command;
    }
}
