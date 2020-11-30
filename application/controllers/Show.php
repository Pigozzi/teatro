<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends Base_Controller
{

    public function __construct()
    {
        parent::__construct('colleger');
    }

    public function index()
    {
        $this->set_title('Espetáculos');
        $this->add_data('shows', $this->show->getAllShows());
        $this->add_data('colleger_shows', $this->colleger_show->get());

        $this->load_show('list');
    }

    public function api()
    {
        json($this->show->get());
    }

    public function edit($id)
    {
        if($this->input->post())
        {
            if($this->form_validation->run('show_edit'))
            {
                $this->show->update(
                    [
                        'id'   => $id,
                        'name' => strtoupper($this->input->post('show')),
                        'date' => switch_date($this->input->post('show_date'))
                    ]
                );

                $this->session->set_flashdata('success', 'Espetáculo editado com sucesso.');
                redirect('espetaculos');
            }
            else
            {
                json($this->form_validation->error_array());
                $this->session->set_flashdata('danger', 'Não foi possível editar o espetáculo selecionado.');
                redirect('editar/espetaculo/'.$id);
            }

        } else {
            $this->set_title('Editar espetáculo');

            $this->add_data('show', $this->show->getById($id));

            $this->load_show('edit');
        }
    }

    public function delete($id)
    {
        $show = $this->show->getById($id);

        if($show) {
            $this->show->delete($id);
            $this->session->set_flashdata('success', 'Espetáculo deletado com sucesso.');
        } else {
            $this->session->set_flashdata('danger', 'Não foi possível deletar o espetáculo selecionado.');
        }

        redirect('espetaculos');

    }

}
