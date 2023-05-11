<?php

namespace Phelper;

use Closure;

class Command
{
    public function __construct(private $name) 
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}