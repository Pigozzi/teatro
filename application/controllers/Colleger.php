<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Colleger extends Base_Controller
{

    public function __construct()
    {
        parent::__construct('colleger');
    }

    public function index()
    {
        $this->set_title('Bolsistas');
        $this->add_data('collegers', $this->colleger->get());

        $this->load_view('list');
    }

    public function create()
    {
        $this->set_title('Cadastro de Bolsista');

        $this->load_view('form');
    }

    public function store()
    {
        if($this->form_validation->run('colleger'))
        {
            $colleger_id = $this->colleger->first_or_create(
                [
                    'name' => strtoupper($this->input->post('colleger'))
                ]
            );

            $show_id = $this->show->first_or_create(
                [
                    'name' => strtoupper($this->input->post('show')),
                    'date' => switch_date($this->input->post('show_date'))
                ]
            );

            $this->colleger_show->insert(
                [
                    'colleger_id' => $colleger_id,
                    'show_id'     => $show_id,
                    'entry'       => $this->input->post('entry'),
                    'departure'   => $this->input->post('departure'),
                    'note'        => $this->input->post('note')
                ]
            );

             json('Bolsista '.strtoupper($this->input->post('colleger')).' foi cadastrado no espetáculo '.strtoupper($this->input->post('show')).'!');
        }
        else
        {
            json($this->form_validation->error_array());
        }
    }

    public function get_colleger_by_id($id)
    {
        json($this->colleger->get($id));
    }

    public function api()
    {
        json($this->colleger->get());
    }

    public function edit($id)
    {
        if($this->input->post())
        {
            if($this->form_validation->run('colleger_edit'))
            {
                $this->colleger->update(
                    [
                        'id'   => $id,
                        'name' => strtoupper($this->input->post('colleger'))
                    ]
                );
                $this->session->set_flashdata('success', 'Bolsista editado com sucesso.');
                redirect('bolsistas');
            }
            else
            {
                json($this->form_validation->error_array());
                $this->session->set_flashdata('danger', 'Não foi possível editar o bolsista selecionado.');
                redirect('editar/bolsista/'.$id);
            }
        } else {
            $this->set_title('Editar Bolsista');

            $this->add_data('colleger', $this->colleger->getById($id));

            $this->load_view('edit');
        }
    }

    public function delete($id)
    {
        $colleger = $this->colleger->getById($id);

        if($colleger) {
            $this->colleger->delete($id);
            $this->session->set_flashdata('success', 'Bolsista deletado com sucesso.');
        } else {
            $this->session->set_flashdata('danger', 'Não foi possível deletar o bolsista selecionado.');
        }

        redirect('bolsistas');

    }

    public function consult($id)
    {
        $this->add_data('shows', $this->show->getShows($id));

        $this->add_data('collegers', $this->colleger->get($id));

        $this->load_view('consult');

    }

}
