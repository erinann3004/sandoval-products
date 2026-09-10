<?php 
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); 
 
/* 
|-------------------------------------------------------------------------- 
| Application Configuration 
|-------------------------------------------------------------------------- 
*/ 
 
$config = array(); 
 
$config['version'] = '4.6.0'; 
 
$config['environment'] = getenv('APP_ENV') ?: 'development'; 

$config['session_hmac_secret'] = getenv('SESSION_HMAC_SECRET') ?: 'LavaLust-Session-Secret-2026-Erin-9xK7mP4qZ8vN2sR6';
$config['sess_match_fingerprint'] = true;
$config['sess_match_ip'] = false;
 
 
/* 
|-------------------------------------------------------------------------- 
| Base URL 
|-------------------------------------------------------------------------- 
| 
| Detect HTTPS correctly when running behind a proxy such as Render. 
| 
*/ 
 
$forwardedProto = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? ''; 
 
if ($forwardedProto === 'https') { 
    $requestScheme = 'https'; 
} elseif (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') { 
    $requestScheme = 'https'; 
} else { 
    $requestScheme = 'http'; 
} 
 
$requestHost = $_SERVER['HTTP_HOST'] ?? 'localhost'; 
 
$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? ''); 
 
$projectPath = preg_replace( 
    '#/(?:public/)?index\.php$#', 
    '', 
    $scriptName 
); 
 
$config['base_url'] = $requestScheme . '://' . $requestHost . rtrim($projectPath, '/'); 