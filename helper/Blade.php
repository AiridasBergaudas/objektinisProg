<?php

namespace helper;

use eftec\bladeone\BladeOne;


class Blade extends BladeOne
{
    public function run($view = null, $variables = []): string
    {
        echo parent::run($view, $variables);
        return "";
    }
}