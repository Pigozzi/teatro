<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class colleger_show extends Base_Controller
{

    public function __construct()
    {
        parent::__construct('colleger');
    }

    public function edit($colleger_id, $show_id)
    {
        if($this->form_validation->run('colleger_show_edit'))
        {
            $this->colleger_show->update(
                [
                    'colleger_id' => $colleger_id,
                    'show_id'     => $show_id,
                    'entry'       => $this->input->post('entry'),
                    'departure'   => $this->input->post('departure'),
                    'note'        => $this->input->post('note')
                ]
            );

             $this->session->set_flashdata('success', 'Espetáculo editado com sucesso.');
             redirect('consultar/bolsista/'.$colleger_id);
        }
        else
        {
            json($this->form_validation->error_array());
            $this->session->set_flashdata('danger', 'Não foi possível editar o espetáculo.');
            redirect('consultar/bolsista/espetaculo/'.$colleger_id."/".$show_id);
        }
    }

    public function delete($colleger_id, $show_id)
    {

        if($colleger_id && $show_id) {
            $this->colleger_show->delete($colleger_id, $show_id);
            $this->session->set_flashdata('success', 'Espetáculo deletado com sucesso.');

        } else {
            $this->session->set_flashdata('danger', 'Não foi possível deletar o espetáculo selecionado.');
        }

        redirect('consultar/bolsista/'.$colleger_id);

    }

    public function consult($colleger_id, $show_id)
    {
        $this->set_title('Editar Bolsista');

        $this->add_data('collegers', $this->colleger->getById($colleger_id));
        $this->add_data('shows', $this->show->getById($show_id));

        $this->add_data('colleger_shows', $this->colleger_show->getShows($colleger_id, $show_id));

        $this->load_show('consult');
    }

}
