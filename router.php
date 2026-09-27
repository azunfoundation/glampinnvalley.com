<?php
/**
 * Local Development Server Router for Glamp Inn Valley
 * Simulates Apache .htaccess behavior (clean URLs, 404 handler, static files)
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$docRoot = __DIR__ . DIRECTORY_SEPARATOR . 'public_html';
$filePath = $docRoot . str_replace('/', DIRECTORY_SEPARATOR, $uri);

// 1. If static file exists directly (css, js, images, etc.), let PHP serve it
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false;
}

// 2. If it's a directory with an index.php
if (is_dir($filePath) && file_exists($filePath . DIRECTORY_SEPARATOR . 'index.php')) {
    $_SERVER['SCRIPT_NAME'] = rtrim($uri, '/') . '/index.php';
    $_SERVER['PHP_SELF'] = rtrim($uri, '/') . '/index.php';
    require $filePath . DIRECTORY_SEPARATOR . 'index.php';
    return true;
}

// 3. Check for extensionless PHP file (e.g. /about or /about/ -> /about.php)
$cleanUri = '/' . trim($uri, '/');
$cleanFilePath = $docRoot . str_replace('/', DIRECTORY_SEPARATOR, $cleanUri);
if ($cleanUri !== '/' && file_exists($cleanFilePath . '.php')) {
    $_SERVER['SCRIPT_NAME'] = $cleanUri . '.php';
    $_SERVER['PHP_SELF'] = $cleanUri . '.php';
    require $cleanFilePath . '.php';
    return true;
}

// 3b. Check for /dome/{id} clean URL (e.g. /dome/twin-right -> dome.php?id=twin-right)
if (preg_match('#^/dome/([a-zA-Z0-9_-]+)/?$#', $uri, $matches)) {
    $_GET['id'] = $matches[1];
    $_SERVER['SCRIPT_NAME'] = '/dome.php';
    $_SERVER['PHP_SELF'] = '/dome.php';
    require $docRoot . DIRECTORY_SEPARATOR . 'dome.php';
    return true;
}

// 4. Root request
if ($uri === '/' || $uri === '') {
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    $_SERVER['PHP_SELF'] = '/index.php';
    require $docRoot . DIRECTORY_SEPARATOR . 'index.php';
    return true;
}

// 5. Fallback custom 404 page
if (file_exists($docRoot . DIRECTORY_SEPARATOR . '404.php')) {
    http_response_code(404);
    require $docRoot . DIRECTORY_SEPARATOR . '404.php';
    return true;
}

return false;
