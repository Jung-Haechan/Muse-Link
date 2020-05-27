<?php

function getFile($file) {
    if ($file === NULL) {
        return asset('storage/base/base_logo.jpg');
    } elseif (strpos($file, 'http') !== false) {
        return $file;
    } else {
        return asset('storage/'.explode('/', $file, 2)[1]);
    }
}

function getFileType($file) {
    if ($file) {
        return explode('/', $file->getMimeType())[0];
    }
    else {
        return NULL;
    }
}

function getRoleColor ($role) {
    if ($role === 'composer') return 'dark';
    elseif ($role === 'editor') return 'primary';
    elseif ($role === 'lyricist') return 'success';
    elseif ($role === 'singer') return 'danger';
}

function getTime($created_at) {
    $created_at = strtotime($created_at);
    $now = strtotime('Now');
    $gap = $now - $created_at;
    if ($gap < 60) {
        return $gap.'초 전';
    } elseif ($gap < 3600) {
        return round($gap/60).'분 전';
    } elseif ($gap < 86400) {
        return round($gap/3600).'시간 전';
    } else {
        return date('Y-m-d', $created_at);
    }
}

function isAdmin($user) {
    return $user !== NULL && $user->id === 1;
}

function isProjectAdmin($user, $project) {
    return $user !== NULL && (isAdmin($user) || $project->user_id === $user->id);
}

function isPostAdmin($user, $post) {
    return $user !== NULL && (isAdmin($user) || $post->user_id === $user->id);
}

function isProjectReplyAdmin($user, $reply) {
    return $user !== NULL && (isProjectAdmin($user, $reply->project) || $reply->user_id === $user->id);
}

function isPostReplyAdmin($user, $reply) {
    return $user !== NULL && (isPostAdmin($user, $reply->post) || $reply->user_id === $user->id);
}

function getYoutubeUrl($url) {
    return explode('watch?v=', $url)[0].'embed/'.explode('watch?v=', $url)[1];
}

function isFaceExhibit($user, $exhibit, $board) {
    return $exhibit->id === $user[$board.'_exhibit_id'];
}

function isUserAdmin($user, $channel_user) {
    return $user !== NULL && (isAdmin($user) || $user->id === $channel_user->id);
}

function getLastPeriod($period) {
    $time = 0;
    if ($period === 'week') {
        $time = 604800;
    } elseif ($period) {
        $time = 18144000;
    }
    return date('Y-m-d H:i:s', strtotime('Now') - $time);
}
