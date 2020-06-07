<?php

namespace App\Policies;

use App\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function update()
    {
        return auth()->user()->isAdmin();
    }

    public function sendComment()
    {
        return auth()->check();
    }
}
