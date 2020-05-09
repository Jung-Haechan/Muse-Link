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
