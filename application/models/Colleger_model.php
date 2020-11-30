<?php

class Colleger_model extends Base_Model
{

    public function __construct()
    {
        parent::__construct('collegers');
    }

    public function get($id = NULL)
    {
        if($id) $this->db->where('id', $id);

        $collegers = $this->db->get($this->table)->result();

        foreach($collegers as $colleger)
        {
            $colleger->hours = $this->colleger_show->get_colleger_hours($colleger->id)->spent_time;
        }

        return $collegers;
    }

    public function getById($id)
    {
        $this->db->select('id')->get($this->table);
        $this->db->where('id', $id);

        return $this->db->get($this->table)->row();
    }

    public function update($colleger)
    {
        $this->db->where('id', $colleger['id']);
        $this->db->set('name', $colleger['name']);

        $this->db->update($this->table);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}
