<?php

namespace Lib\Phelper;

use Lib\Phelper\App;

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
