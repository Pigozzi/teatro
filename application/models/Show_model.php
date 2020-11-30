<?php

class Show_model extends Base_Model
{

    public function __construct()
    {
        parent::__construct('shows');
    }

    public function get()
    {
        return $this->db->distinct()->select('name')->get($this->table)->result();
    }

    public function getById($id)
    {
        $this->db->select('id')->get($this->table);
        $this->db->where('id', $id);

        return $this->db->get($this->table)->row();
    }

    public function getAllShows()
    {
        return $this->db->select('*')->get($this->table)->result();
    }

    public function getShows($colleger_id)
	{
        return $this->db->select('shows.id, shows.name, date, entry, departure, note')
        ->join('colleger_shows', 'colleger_shows.show_id = shows.id')
        ->join('collegers', 'collegers.id = colleger_shows.colleger_id')
        ->where('colleger_shows.colleger_id', $colleger_id)
        ->get($this->table)
        ->result();
    }

    public function update($show)
    {
        $this->db->where('id', $show['id']);
        $this->db->set('name', $show['name']);
        $this->db->set('date', $show['date']);

        $this->db->update($this->table);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}
