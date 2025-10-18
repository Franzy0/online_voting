<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Voter_model extends Model {

    public function authenticate($email, $password) {
        $this->db->table('voters');
        $this->db->where('email', $email);
        $voter = $this->db->get()->row_array();

        if ($voter && password_verify($password, $voter['password'])) {
            return $voter;
        }
        return false;
    }

    public function get_all_candidates() {
        return $this->db->table('candidates')->get_all();
    }

    public function has_voted($voter_id, $candidate_id) {
        $this->db->table('votes');
        $this->db->where('voter_id', $voter_id);
        $this->db->where('candidate_id', $candidate_id);
        return $this->db->count_all_results() > 0;
    }

    public function record_vote($voter_id, $candidate_id) {
        $data = [
            'voter_id' => $voter_id,
            'candidate_id' => $candidate_id,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->table('votes')->insert($data);
    }
}
