<?php

namespace App\Policies;

use App\Models\User;
use App\Models\evaluation;
use Illuminate\Auth\Access\Response;

class EvaluationPolicy
{
    public function createEvaluations(User $user)
    {
        return $user->role === 'coder';
    }
}
