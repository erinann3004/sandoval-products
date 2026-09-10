<?php

class MigrateCommand
{
    public static $command = 'migrate';
    public static $description = 'Run all pending database migrations';
    public static $arguments = [];

    public function handle()
    {
        $root = dirname(APP_DIR) . DIRECTORY_SEPARATOR;

        if (!defined('PREVENT_DIRECT_ACCESS')) {
            define('PREVENT_DIRECT_ACCESS', TRUE);
        }
        if (!defined('ROOT_DIR')) {
            define('ROOT_DIR', $root);
        }
        if (!defined('SYSTEM_DIR')) {
            define('SYSTEM_DIR', ROOT_DIR . 'scheme' . DIRECTORY_SEPARATOR);
        }

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';
        $_SERVER['PHP_SELF'] = '/index.php';
        $original_argv = $GLOBALS['argv'];
        $GLOBALS['argv'][1] = '/';
        ob_start();
        require_once SYSTEM_DIR . 'kernel/LavaLust.php';
        ob_end_clean();
        $GLOBALS['argv'] = $original_argv;

        $migration = lava_instance()->call->library('migration');
        $migration->migrate();
    }
}
