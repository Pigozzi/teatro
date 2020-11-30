<?php

$config = array(
    'colleger' =>
        array(
            array(
                'field' => 'colleger',
                'label' => 'Nome do Bolsista',
                'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
            ),
            array(
                'field' => 'entry',
                'label' => 'Entrada',
                'rules' => 'required'
            ),
            array(
                'field' => 'departure',
                'label' => 'Saida',
                'rules' => 'required'
            ),
            array(
                'field' => 'note',
                'label' => 'Comentario',
                'rules' => 'regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]',
            ),
            array(
                'field' => 'show',
                'label' => 'Espetaculo',
                'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
            ),
            array(
                'field'  => 'show_date',
                'label'  => 'Data',
                'rules'  => 'required|valid_date',
                'errors' => array(
                    'valid_date' => 'O campo {field} deve conter uma data válida'
                ),
            ),
        ),

        'colleger_edit' =>
            array(
                array(
                    'field' => 'colleger',
                    'label' => 'Nome do Bolsista',
                    'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]'
                ),
            ),

        'show_edit' =>
            array(
                array(
                    'field' => 'show',
                    'label' => 'Espetaculo',
                    'rules' => 'required|regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]',
                ),
                array(
                    'field'  => 'show_date',
                    'label'  => 'Data',
                    'rules'  => 'required|valid_date',
                    'errors' => array(
                        'valid_date' => 'O campo {field} deve conter uma data válida',
                    ),
                ),
            ),

        'colleger_show_edit' =>
            array(
                array(
                    'field' => 'entry',
                    'label' => 'Entrada',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'departure',
                    'label' => 'Saida',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'note',
                    'label' => 'Comentario',
                    'rules' => 'regex_match[/^[a-zA-ZÀ-Úà-ú ]+$/]',
                ),
        ),
);

function valid_date($date)
{
    return date('d/m/Y', strtotime(str_replace('/', '-', $date))) === $date ? true : false;
}
