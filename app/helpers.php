<?php

function getFile($file) {
    $file_name = 'storage/'.explode('/', $file, 2)[1];
    return $file_name;
}

