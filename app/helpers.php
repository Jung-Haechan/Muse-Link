<?php

function getFile($file) {
    return 'storage/'.explode('/', $file, 2)[1];
}
