<?php

namespace Phelper;

class CliPrinter
{
    public function out(string $message): void
    {
        echo $message;
    }

    public function newLine(): void
    {
        $this->out("\n");
    }

    public function display(string $message)
    {
        $this->newline();
        $this->out($message);
        $this->newline();
        $this->newline();
    }
}