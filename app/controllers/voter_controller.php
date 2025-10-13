<?php
class voter_controller extends Controller
{
    private $voter_model;

    public function __construct()
    {
        parent::__construct();
        // Load the model properly for LavaLust
        $this->voter_model = $this->call->model('Voter_model');
        // Start session manually (LavaLust doesn’t auto-start)
        session_start();
    }

    // 🟢 Login Page
    public function login()
    {
        // Redirect if already logged in
        if (isset($_SESSION['voter_email'])) {
            redirect('voter/dashboard');
            return;
        }

        $data['msg'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($email) && !empty($password)) {
                $voter = $this->voter_model->authenticate($email, $password);

                if ($voter) {
                    $_SESSION['voter_email'] = $voter['email'];
                    $_SESSION['voter_id'] = $voter['id'];
                    $_SESSION['voter_name'] = $voter['fullname'];
                    redirect('voter/dashboard');
                    return;
                } else {
                    $data['msg'] = '❌ Invalid email or password.';
                }
            } else {
                $data['msg'] = '⚠️ Please fill out all fields.';
            }
        }

        $this->call->view('voter_login', $data);
    }

    // 🟢 Dashboard Page
    public function dashboard()
    {
        if (!isset($_SESSION['voter_email'])) {
            redirect('voter/login');
            return;
        }

        $data['msg'] = '';
        $voter_id = $_SESSION['voter_id'];

        if (isset($_POST['candidate_id'])) {
            $cid = intval($_POST['candidate_id']);

            if (!$this->voter_model->has_voted($voter_id, $cid)) {
                if ($this->voter_model->record_vote($voter_id, $cid)) {
                    $data['msg'] = "✅ Vote recorded successfully!";
                } else {
                    $data['msg'] = "❌ Error saving your vote.";
                }
            } else {
                $data['msg'] = "⚠️ You already voted for this candidate.";
            }
        }

        $data['candidates'] = $this->voter_model->get_all_candidates();
        $data['voter_name'] = $_SESSION['voter_name'];

        $this->call->view('voter_dashboard', $data);
    }

    // 🟢 Logout
    public function logout()
    {
        session_destroy();
        redirect('voter/login');
    }
}
