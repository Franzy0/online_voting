<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Voter_controller extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('Voter_model');
        session_start();
    }

    public function login() {
        if (isset($_SESSION['voter_email'])) {
            redirect('voter/dashboard');
        }

        $msg = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $voter = $this->Voter_model->authenticate($email, $password);

            if ($voter) {
                $_SESSION['voter_email'] = $voter['email'];
                $_SESSION['voter_id'] = $voter['id'];
                $_SESSION['voter_name'] = $voter['fullname'];
                redirect('voter/dashboard');
            } else {
                $msg = '❌ Invalid credentials.';
            }
        }

        $this->call->view('voter_login', ['msg' => $msg]);
    }

    public function dashboard() {
        if (!isset($_SESSION['voter_email'])) {
            redirect('voter/login');
        }

        $voter_id = $_SESSION['voter_id'];
        $msg = '';

        if (isset($_POST['candidate_id'])) {
            $cid = intval($_POST['candidate_id']);
            if (!$this->Voter_model->has_voted($voter_id, $cid)) {
                $this->Voter_model->record_vote($voter_id, $cid);
                $msg = "✅ Vote recorded successfully!";
            } else {
                $msg = "⚠️ You already voted for this candidate.";
            }
        }

        $data = [
            'candidates' => $this->Voter_model->get_all_candidates(),
            'voter_name' => $_SESSION['voter_name'],
            'msg' => $msg
        ];

        $this->call->view('voter_dashboard', $data);
    }

    public function logout() {
        session_destroy();
        redirect('voter/login');
    }
}
