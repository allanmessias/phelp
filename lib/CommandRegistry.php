<?php

namespace Phelper;

class CommandRegistry 
{
    protected $registry = [];

    public function register(string $name, callable $callable)
    {
        $this->registry[$name] = $callable;
    }

    public function get(string $command)
    {
        return isset($this->registry[$command]) ? $this->registry[$command] : null;
    }
}