<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->helper('security');
        $this->call->database();
        $this->call->model('AccountModel');
        $this->call->library('session');
    }

    public function login()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim((string) $this->request->post('email'));
            $password = (string) $this->request->post('password');
            $account = $this->AccountModel->find_by('email', $email);

            if ($account && !empty($account['is_active']) && password_verify($password, $account['password'])) {
                $this->session->regenerate_on_login();
                $this->session->set_userdata([
                    'account_id' => $account['id'],
                    'account_name' => $account['firstname'] . ' ' . $account['lastname'],
                ]);
                redirect('products');
            }

            $error = 'Invalid email or password.';
        }

        $this->call->view('auth/login', ['title' => 'Login', 'error' => $error]);
    }

    public function register()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'firstname' => trim((string) $this->request->post('firstname')),
                'lastname' => trim((string) $this->request->post('lastname')),
                'username' => trim((string) $this->request->post('username')),
                'email' => trim((string) $this->request->post('email')),
                'password' => password_hash((string) $this->request->post('password'), PASSWORD_DEFAULT),
                'role' => 'account',
                'is_active' => 1,
            ];

            if (in_array('', [$data['firstname'], $data['lastname'], $data['username'], $data['email']], true)) {
                $error = 'Please complete all required fields.';
            } elseif ($this->AccountModel->find_by('email', $data['email'])) {
                $error = 'That email address is already registered.';
            } else {
                $this->AccountModel->insert($data);
                redirect('login');
            }
        }

        $this->call->view('auth/register', ['title' => 'Register', 'error' => $error]);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}