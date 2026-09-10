<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        $session = load_class('Session', 'libraries');

        if (!$session->userdata('account_id')) {
            redirect('login');
            return null;
        }

        return $next();
    }
}