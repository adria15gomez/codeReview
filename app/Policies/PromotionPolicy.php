<?php

namespace App\Policies;

use App\Models\User;
use App\Models\promotion;
use Illuminate\Auth\Access\Response;

class PromotionPolicy
{
    public function managePromotions(User $user)
    {
        return $user->role === 'trainer';
    }

    /**
     * Determine whether the trainer can view, create, and destroy topics.
     */
}
