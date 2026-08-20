<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if student has access
        if (!isset($_SESSION['student_access']) || $_SESSION['student_access'] !== true) {
            header('Location: ' . site_url('student') . '?access=denied');
            exit;
        }

        // Access allowed
        return $next();
    }
}
