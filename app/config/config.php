<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| Config Files
| -------------------------------------------------------------------
*/

$config['version'] = '4.6.0';

$config['environment'] = getenv('APP_ENV') ?: 'development';

$requestScheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
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

/*
|------------------------------------------------------------------
| Session
|------------------------------------------------------------------
*/

$config['sess_driver'] = 'file';
$config['sess_table'] = 'sessions';
$config['sess_cookie_name'] = 'LLSession';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = '';
$config['sess_match_ip'] = FALSE;
$config['sess_match_fingerprint'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;
$config['sess_expire_on_close'] = FALSE;
$config['max_invalid_attempts'] = 5;
$config['invalid_window'] = 600;
$config['lock_duration_invalid'] = 900;
$config['max_session_creations'] = 10;
$config['creation_window'] = 60;
$config['lock_duration_creation'] = 120;
$config['security_file'] = ROOT_DIR . 'runtime/session/session_security.json';
$config['sess_inactivity_timeout'] = 1800;
$config['session_hmac_secret'] = getenv('APP_KEY') ?: '';

/*
|------------------------------------------------------------------
| Cookies
|------------------------------------------------------------------
*/

$config['cookie_prefix'] = '';
$config['cookie_domain'] = '';
$config['cookie_path'] = '/';
$config['cookie_secure'] = FALSE;
$config['cookie_expiration'] = 86400;
$config['cookie_httponly'] = FALSE;
$config['cookie_samesite'] = 'Strict';

/*
|------------------------------------------------------------------
| Cache
|------------------------------------------------------------------
*/

$config['cache_driver'] = 'php';
$config['cache_dir'] = ROOT_DIR . 'runtime/cache/';
$config['cache_default_expires'] = 0;
$config['lock_lock_timeout'] = 5;
$config['lock_lock_sleep'] = 100000;

/*
|------------------------------------------------------------------
| Encryption Key
|------------------------------------------------------------------
*/

$config['encryption_key'] = getenv('APP_KEY') ?: '';

/*
|------------------------------------------------------------------
| Soft Delete
|------------------------------------------------------------------
*/

$config['soft_delete'] = FALSE;
$config['soft_delete_column'] = 'deleted_at';

/*
|------------------------------------------------------------------
| Created At and Updated At Column
|------------------------------------------------------------------
*/

$config['timestamps'] = FALSE;
$config['created_at_column'] = 'created_at';
$config['updated_at_column'] = 'updated_at';

/*
|------------------------------------------------------------------
| Cross Site Request Forgery
|------------------------------------------------------------------
*/

$config['csrf_protection'] = FALSE;
$config['csrf_exclude_uris'] = array();
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = FALSE;


/*
|--------------------------------------------------------------------------
| Middleware Configuration
|--------------------------------------------------------------------------
*/

require_once APP_DIR . 'config/middleware.php';

?>
