<?php

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestedFile = realpath(__DIR__.$requestPath);

if ($requestPath !== '/' && $requestedFile !== FALSE
    && strpos($requestedFile, __DIR__.DIRECTORY_SEPARATOR) === 0
    && is_file($requestedFile))
{
    return FALSE;
}

require __DIR__.'/index.php';
