<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @author: Tiago Villalobos
*
* Classe responsável por agrupar principais funcionalidades para os demais
* models
*/
class Base_Model extends CI_Model
{

    protected $table;
    protected $object;

    /**
    * @author: Tiago Villalobos
    *
    * Construtor que inicializa a classe pai e define o atributo table da
    * classe, além de inicializar o atributo object como um array vazio
    *
    * @param: string table - O nome da tabela utilizada pelo model
    */
    public function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
        $this->object = array();
    }

    /**
    * @author: Tiago Villalobos
    *
    * Verifica se existe o registro no banco de dados utilizado o parâmetro
    * fields, criando o registro caso não encontrado. Para o mesmo verifica
    * se existem parâmetros adicionais passados pelo newFields criando o
    * registro com estes. Para então retornar o id criado ou o id existente
    * no caso do registro já existir
    *
    * @param: array $fields - Dados para comparação
    * @param: array $newFields = Novos dados que devem ser adicionados ao
    * registro
    *
    * @return: int - O último id inserido ou o id existente
    */
    public function first_or_create($fields, $new_fields = NULL)
    {
        $this->create_where($fields);

        $result = $this->db->get($this->table)->row();

        $this->db->flush_cache();
        if($result)
        {
            return $result->id;
        }
        else
        {

            $this->set_object_fields($fields);

            if($new_fields)
            {
                $this->set_object_fields($new_fields);
            }

            $this->db->insert($this->table, $this->object);

            return $this->db->insert_id();

        }


    }

    /**
    * @author: Tiago Villalobos
    *
    * Uitliza o query builder para criar clausulas where utilizando o parâmetro
    * fields
    *
    * @param: array fields - Lista de campos de comparação para as clausulas
    * where
    */
    private function create_where($fields)
    {
        foreach($fields as $key => $value)
        {
            $this->db->where($key, $value);

        }
    }

    /**
    * @author: Tiago Villalobos
    *
    * Utiliza o parâmetro fields para adicionar os campos necessários para a
    * persistência de um novo registro no banco de dados
    *
    * @param: array fields - Campos a serem adicionados ao object
    */
    private function set_object_fields($fields)
    {
        foreach($fields as $key => $value)
        {
            $this->object[$key] = $value;
        }

    }

}
