<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class admin_model extends Model {

    // Verify admin login
    public function verify_login($username, $password) {
        $hashed = md5($password);
        $this->db->table('admin')
                 ->where('username', $username)
                 ->where('password', $hashed);
        $result = $this->db->get();
        return $result->num_rows() > 0;
    }

    // Count total voters
    public function get_total_voters() {
        $query = $this->db->raw("SELECT COUNT(*) AS total FROM voters");
        return $query->row('total');
    }

    // Count total candidates
    public function get_total_candidates() {
        $query = $this->db->raw("SELECT COUNT(*) AS total FROM candidates");
        return $query->row('total');
    }

    // Count total votes
    public function get_total_votes() {
        $query = $this->db->raw("SELECT COUNT(*) AS total FROM votes");
        return $query->row('total');
    }
}
?>
