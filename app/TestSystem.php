<?php

namespace App;

use Illuminate\Support\Facades\Facade;


class TestSystem extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'test';
    }
}