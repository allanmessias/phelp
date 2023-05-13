<?php

namespace Phelper;

use Phelper\App;

class Command
{
    protected string $defaultDescription;

    protected string $defaultName;
    protected ?string $name;
    protected string $description;
    protected App $app;
    protected array $flags;

    public function __construct(?string $name = null) 
    {
       $this->name = $name;
       $this->configure();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Command
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(string $description): Command
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    protected function configure(){}
}