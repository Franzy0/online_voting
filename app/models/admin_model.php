<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin_model extends Model {

    public function verify_login($username, $password) {
        $query = $this->db->table('admin')->where('username', $username)->get();

        if ($query->num_rows() > 0) {
            $admin = $query->row_array();
            if (password_verify($password, $admin['password'])) {
                return true;
            }
        }
        return false;
    }

    public function get_total_voters() {
        return $this->db->table('voters')->count_all_results();
    }

    public function get_total_candidates() {
        return $this->db->table('candidates')->count_all_results();
    }

    public function get_total_votes() {
        return $this->db->table('votes')->count_all_results();
    }
}
?>
