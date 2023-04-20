<?php

namespace App\Policies;

use App\Models\User;
use App\Models\competence;
use Illuminate\Auth\Access\Response;

class CompetencePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewCompetence(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, competence $competence)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function createCompetence(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function updateCompetence(User $user, competence $competence)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteCompetence(User $user, competence $competence)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreCompetence(User $user, competence $competence)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteCompetence(User $user, competence $competence)
    {
        //
    }
}
