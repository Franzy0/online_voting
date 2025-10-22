<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class VoterModel extends Model
{
    protected $table = 'voters'; // your table name

    public function get_voter_by_email($email)
    {
        return $this->db->table($this->table)
                        ->where('email', $email)
                        ->get()
                        ->row_array();
    }

    public function register_voter($data)
    {
        // Example for registration, if needed later
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->table($this->table)->insert($data);
    }

    public function get_all_voters()
    {
        return $this->db->table($this->table)->get_all();
    }
}
