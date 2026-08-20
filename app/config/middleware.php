<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

require_once APP_DIR . 'middlewares/StudentMiddleware.php';

$config['middlewares'] = [
    'student' => new StudentMiddleware()
];