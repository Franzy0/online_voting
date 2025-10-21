<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin_model extends Model
{
    protected $table = 'admin'; // Change this to your admin table name

    public function get_by_username($username)
    {
        return $this->db->table($this->table)
                        ->where('username', $username)
                        ->get();
    }
}
?>
