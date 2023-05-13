<?php

namespace App\Command;

use Phelper\Command;

class HelpCommand extends Command
{
    private Command $command; 
    protected function configure()
    {
        $this
            ->setName('help')
            ->setDescription('The help command, used to know about others commands');
        
    }
}
