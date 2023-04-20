<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TopicPolicy
{
    public function manageTopics(User $user)
    {
        return $user->role === 'trainer';
    }
}
