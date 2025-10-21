<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class VoterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('VoterModel');
    }

    // Voter Login Page
    public function login()
    {
        // Only handle login when form is POSTed
        if ($this->io->method() === 'post') {
            $voter_id = $this->io->post('voter_id');
            $password = $this->io->post('password');

            $voter = $this->VoterModel->check_login($voter_id, $password);

            if ($voter) {
                $this->session->set_userdata('voter_id', $voter['id']);
                redirect('voter/vote');
            } else {
                $data['error'] = "Invalid Voter ID or Password.";
                $this->call->view('voter/login', $data);
                return;
            }
        }

        // Show login page for GET or after failure
        $this->call->view('voter/login');
    }

    // Voting Page
    public function vote()
    {
        if (!$this->session->has_userdata('voter_id')) {
            redirect('voter/login');
        }

        $voter_id = $this->session->userdata('voter_id');

        // Only process when form is POSTed
        if ($this->io->method() === 'post') {
            // use io->post to read candidate_id safely (since method is POST)
            $candidate_id = $this->io->post('candidate_id');

            $has_voted = $this->VoterModel->has_voted($voter_id);
            if ($has_voted) {
                $data['message'] = "You have already voted.";
            } else {
                $this->VoterModel->submit_vote($voter_id, $candidate_id);

                // Optionally update voters.has_voted flag
                $this->VoterModel->mark_as_voted($voter_id);

                $data['message'] = "Your vote has been successfully recorded.";
            }
        }

        $data['candidates'] = $this->VoterModel->get_candidates();
        $this->call->view('voter/vote', $data);
    }

    // Voter Logout
    public function logout()
    {
        $this->session->unset_userdata('voter_id');
        redirect('voter/login');
    }
}
