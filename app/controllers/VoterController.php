<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Voter extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('VoterModel');
        $this->call->library('session');
    }

    // -------------------------------
    // LOGIN PAGE (GET + POST)
    // -------------------------------
    public function login()
    {
        // If already logged in, redirect to dashboard
        if ($this->session->has('voter')) {
            redirect('voter/dashboard');
            return;
        }

        // Handle POST request (form submit)
        if ($this->io->post('email') && $this->io->post('password')) {
            $email = $this->io->post('email');
            $password = $this->io->post('password');

            // Check if valid voter
            $voter = $this->VoterModel->get_voter_by_email($email);

            if ($voter && password_verify($password, $voter['password'])) {
                // Save to session
                $this->session->set('voter', [
                    'id' => $voter['id'],
                    'fullname' => $voter['fullname'],
                    'email' => $voter['email']
                ]);

                redirect('voter/dashboard');
            } else {
                $data['error'] = 'Invalid email or password.';
                $this->call->view('voter/login', $data);
                return;
            }
        }

        // Default: show login page
        $this->call->view('voter/login');
    }

    // -------------------------------
    // DASHBOARD PAGE
    // -------------------------------
    public function dashboard()
    {
        if (!$this->session->has('voter')) {
            redirect('voter/login');
            return;
        }

        $data['voter'] = $this->session->get('voter');
        $this->call->view('voter/dashboard', $data);
    }

    // -------------------------------
    // LOGOUT
    // -------------------------------
    public function logout()
    {
        $this->session->destroy();
        redirect('voter/login');
    }
}
