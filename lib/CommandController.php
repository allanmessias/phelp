<?php

namespace Phelper;

use Phelper\App;

abstract class CommandController
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    protected function getApp()
    {
        return $this->app;
    }
}
