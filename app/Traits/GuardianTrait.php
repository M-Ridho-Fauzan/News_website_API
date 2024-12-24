<?php

namespace App\Traits;

use Guardian\GuardianAPI;

trait GuardianTrait
{
    public function getGuardianAPI()
    {
        return new GuardianAPI('c3c30a7c-75e9-4a61-989a-e08d2bd1e508');
    }
}
