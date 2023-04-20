<?php

namespace App\Policies;

use App\Models\User;
use App\Models\coevaluation;
use Illuminate\Auth\Access\Response;

class CoevaluationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewCoevaluation(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, coevaluation $coevaluation)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function createCoevaluation(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function updateCoevaluation(User $user, coevaluation $coevaluation)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteCoevaluation(User $user, coevaluation $coevaluation)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreCoevaluation(User $user, coevaluation $coevaluation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteCoevaluation(User $user, coevaluation $coevaluation)
    {
        //
    }
}
