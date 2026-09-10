$config['version'] = '4.6.0';

$config['environment'] = getenv('APP_ENV') ?: 'development';

/*
| -------------------------------------------------------------------
| Base URL
| -------------------------------------------------------------------
| Render uses HTTPS through a proxy, so force HTTPS for production.
*/

if (($config['environment'] ?? '') === 'production') {
    $requestScheme = 'https';
} else {
    $requestScheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        ? 'https'
        : 'http';
}

$requestHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$projectPath = preg_replace('#/(?:public/)?index\\.php$#', '', $scriptName);

$config['base_url'] = $requestScheme . '://' . $requestHost . rtrim($projectPath, '/');

$config['proxy_enabled'] = FALSE;

$config['index_page'] = 'index.php';

$config['log_threshold'] = 0;
$config['log_dir'] = 'runtime/logs/';

$config['composer_autoload'] = FALSE;

$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

$config['charset'] = 'UTF-8';

$config['error_view_path'] = '';

$config['404_override'] = '';

$config['language'] = 'en-US';

$config['subclass_prefix'] = 'MY_';