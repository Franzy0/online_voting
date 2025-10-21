<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class VoterModel extends Model
{
    // Check login credentials
    public function check_login($voter_id, $password)
    {
        $this->db->where('voter_id', $voter_id);
        $this->db->where('password', $password);
        return $this->db->get('voters')->row_array();
    }

    // Get all candidates
    public function get_candidates()
    {
        return $this->db->get('candidates')->result_array();
    }

    // Check if voter already voted
    public function has_voted($voter_id)
    {
        $this->db->where('voter_id', $voter_id);
        $vote = $this->db->get('votes')->row_array();
        return $vote ? true : false;
    }

    // Save vote to DB
    public function submit_vote($voter_id, $candidate_id)
    {
        $data = [
            'voter_id' => $voter_id,
            'candidate_id' => $candidate_id,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('votes', $data);
    }
    public function mark_as_voted($voter_id)
    {
        $this->db->where('id', $voter_id);
        return $this->db->update('voters', ['has_voted' => 1]);
    }

}
