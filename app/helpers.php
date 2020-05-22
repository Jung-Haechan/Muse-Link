<?php

function getFile($file) {
    return 'storage/'.explode('/', $file, 2)[1];
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

function getProjectCreatedTime($created_at) {
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
