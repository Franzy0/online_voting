<?php
class voter_model extends Model
{
    protected $table = "voters";

    public function authenticate($email, $password)
    {
        $hashed = md5($password);
        return $this->db->table($this->table)
            ->where(['email' => $email, 'password' => $hashed])
            ->get()
            ->getRowArray();
    }

    public function get_all_candidates()
    {
        return $this->db->table('candidates')
            ->orderBy('position', 'ASC')
            ->orderBy('name', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function has_voted($voter_id, $candidate_id)
    {
        return $this->db->table('votes')
            ->where(['voter_id' => $voter_id, 'candidate_id' => $candidate_id])
            ->countAllResults() > 0;
    }

    public function record_vote($voter_id, $candidate_id)
    {
        return $this->db->table('votes')->insert([
            'voter_id' => $voter_id,
            'candidate_id' => $candidate_id
        ]);
    }
}
