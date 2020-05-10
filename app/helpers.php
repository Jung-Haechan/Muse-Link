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
