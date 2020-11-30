<?php

class Colleger_Show_model extends Base_Model
{

    public function __construct()
    {
        parent::__construct('colleger_shows');
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function get()
    {
        return $this->db->distinct()->select('show_id')->get($this->table)->result();
    }

    public function getShows($colleger_id, $show_id)
    {
        return $this->db->select('shows.id, shows.name, date, entry, departure, note')
        ->join('shows', 'shows.id = colleger_shows.show_id')
        ->join('collegers', 'collegers.id = colleger_shows.colleger_id')
        ->where('colleger_id', $colleger_id)
        ->where('show_id', $show_id)
        ->get($this->table)
        ->result();
    }

    public function get_colleger_hours($colleger_id)
    {
        return $this->db
        ->select('SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(departure, entry)))) AS spent_time')
        ->from($this->table)
        ->where('colleger_id', $colleger_id)
        ->get()
        ->row();
    }

    public function update($colleger_show)
    {
        $this->db->where('colleger_id', $colleger_show['colleger_id']);
        $this->db->where('show_id',     $colleger_show['show_id']);
        $this->db->set('entry',         $colleger_show['entry']);
        $this->db->set('departure',     $colleger_show['departure']);
        $this->db->set('note',          $colleger_show['note']);

        $this->db->update($this->table);
    }

    public function delete($colleger_id, $show_id)
    {
        $this->db->where('colleger_id', $colleger_id);
        $this->db->where('show_id', $show_id);
        $this->db->delete($this->table);
    }

}
