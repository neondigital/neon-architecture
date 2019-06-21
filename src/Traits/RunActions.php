<?php

namespace Neondigital\NeonArchitecture\Traits;

use Neondigital\NeonArchitecture\Contracts\CanRun;

trait RunActions
{
    public function run(CanRun $action)
    {
        return $action->act();
    }
}
