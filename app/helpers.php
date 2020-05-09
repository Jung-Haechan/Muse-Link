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

function translateRole ($role) {
    if ($role === 'composer') return '작곡';
    elseif ($role === 'editor') return '편곡';
    elseif ($role === 'lyricist') return '작사';
    elseif ($role === 'singer') return '보컬';
}
