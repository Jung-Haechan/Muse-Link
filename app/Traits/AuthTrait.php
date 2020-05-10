<?php


namespace App\Traits;

use App\Models\Collaborator;
use App\User;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{
    function isRegisteredUser($user)
    {
        if (User::where('email', $user->getEmail())->first()) {
            return true;
        } else {
            return false;
        }
    }

    function isProjectAdmin($user, $project) {
        if ($project->user_id === $user->id) {
            return true;
        } elseif ($project->collaborators()
            ->where('user_id', $user->id)
            ->where('role', 'master')->first()) {
            return true;
        } else {
            return false;
        }
    }

    function isCollaborator($user, $project, $role)
    {
        if ($isApllied = Collaborator::where([
            'user_id' => $user->id,
            'project_id' => $project->id,
            'role' => $role,
        ])->first()) return $isApllied->is_approved;
        elseif ($this->isProjectAdmin($user, $project)) return 1;
        else return NULL; //미신청
    }
}
