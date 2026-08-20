<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

        $accessDenied = (($_GET['access'] ?? '') === 'denied');

        if ($accessDenied) {
            $_SESSION['student_access'] = true;
        }

        $data = [
            'title' => 'My Student Hub',
            'access_message' => $accessDenied
                ? 'Student Profile is protected. Please click Student Profile again to continue.'
                : null
        ];

        $this->call->view('home', $data);
    }

    public function profile()
    {
        $data = [
            'title'      => 'Student Profile',
            'student_id' => 'MCC2024-00163',
            'name'       => 'Sandoval, Erin Ann D.',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => '3-F4',
            'email'      => 'sndvlern23@gmail.com',
            'birth_date' => 'December 30, 2004',
            'age'        => '21 years old',
            'contact'    => '+63 992 926 7809',
            'photo'      => 'assets/images/nero.jpg',
            'hobbies'    => ['Reading', 'Listening to music', 'Creative projects']
        ];

        $this->call->view('student_profile', $data);
    }
}
