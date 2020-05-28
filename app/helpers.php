<?php

use App\Models\Collaborator;

function getFile($file)
{
    if ($file === NULL) {
        return asset('storage/base/base_logo.jpg');
    } elseif (strpos($file, 'http') !== false) {
        return $file;
    } else {
        return asset('storage/' . explode('/', $file, 2)[1]);
    }
}

function getFileType($file)
{
    if ($file) {
        return explode('/', $file->getMimeType())[0];
    } else {
        return NULL;
    }
}

function getRoleColor($role)
{
    if ($role === 'composer') return 'dark';
    elseif ($role === 'editor') return 'primary';
    elseif ($role === 'lyricist') return 'success';
    elseif ($role === 'singer') return 'danger';
}

function getAccessibilityColor($is_opened)
{
    if ($is_opened === 0) return 'success';
    elseif ($is_opened === 1) return 'primary';
    elseif ($is_opened === 2) return 'warning';
    elseif ($is_opened === 3) return 'danger';
    else return 'dark';
}

function getTime($created_at)
{
    $created_at = strtotime($created_at);
    $now = strtotime('Now');
    $gap = $now - $created_at;
    if ($gap < 60) {
        return $gap . '초 전';
    } elseif ($gap < 3600) {
        return round($gap / 60) . '분 전';
    } elseif ($gap < 86400) {
        return round($gap / 3600) . '시간 전';
    } else {
        return date('Y-m-d', $created_at);
    }
}

function isAdmin($user)
{
    return $user !== NULL && $user->id === 1;
}

function isProjectAdmin($user, $project)
{
    return $user !== NULL && (isAdmin($user) || $project->user_id === $user->id);
}

function isVersionAdmin($user, $version)
{
    return $user !== NULL && (isProjectAdmin($user, $version->project) || $version->user_id === $user->id);
}

function isPostAdmin($user, $post)
{
    return $user !== NULL && (isAdmin($user) || $post->user_id === $user->id);
}

function isProjectReplyAdmin($user, $reply)
{
    return $user !== NULL && (isProjectAdmin($user, $reply->project) || $reply->user_id === $user->id);
}

function isPostReplyAdmin($user, $reply)
{
    return $user !== NULL && (isPostAdmin($user, $reply->post) || $reply->user_id === $user->id);
}

function getYoutubeUrl($url)
{
    return explode('watch?v=', $url)[0] . 'embed/' . explode('watch?v=', $url)[1];
}

function isFaceExhibit($user, $exhibit, $board)
{
    return $exhibit->id === $user[$board . '_exhibit_id'];
}

function isUserAdmin($user, $channel_user)
{
    return $user !== NULL && (isAdmin($user) || $user->id === $channel_user->id);
}

function getLastPeriod($period)
{
    $time = 0;
    if ($period === 'week') {
        $time = 604800;
    } elseif ($period === 'month') {
        $time = 2600000;
    }
    return date('Y-m-d H:i:s', strtotime('Now') - $time);
}

function isCollaborator($user, $project)
{
    return $user !== NULL &&
            $project->collaborators()
                ->where('user_id', $user->id)
                ->where('is_approved', 1)->first() !== NULL
        ;
}

function isFollower($user, $followee)
{
    return $user !== NULL &&
        $followee->followers()
            ->where('user_id', $user->id)->first() !== NULL;
}

function canAccessProject($user, $project)
{
    if (isProjectAdmin($user, $project)) {
        return true;
    } elseif ($project->is_opened === 0) {
        return true;
    } elseif ($project->is_opened === 1) {
        return $user !== NULL;
    } elseif ($project->is_opened === 2) {
        return $user !== NULL &&
            (isCollaborator($user, $project) ||
                isFollower($user, $project->user)
            );
    } elseif ($project->is_opened === 3) {
        return $user !== NULL && isCollaborator($user, $project);
    } else {
        return false;
    }
}

function canAccessVersion($user, $version)
{
    if (isVersionAdmin($user, $version)) {
        return true;
    } elseif ($version->is_opened === 0) {
        return true;
    } elseif ($version->is_opened === 1) {
        return $user !== NULL;
    } elseif ($version->is_opened === 2) {
        return $user !== NULL &&
            (isCollaborator($user, $version->project) ||
                isFollower($user, $version->user)
            );
    } elseif ($version->is_opened === 3) {
        return $user !== NULL && isCollaborator($user, $version->project);
    } else {
        return false;
    }
}

function canAccessExhibit($user, $exhibit)
{
    if (isUserAdmin($user, $exhibit->user)) {
        return true;
    } elseif ($exhibit->is_opened === 0) {
        return true;
    } elseif ($exhibit->is_opened === 1) {
        return $user !== NULL;
    } elseif ($exhibit->is_opened === 2) {
        return $user !== NULL && isFollower($user, $exhibit->user);
    } else {
        return false;
    }
}
