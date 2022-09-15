<?php

namespace Application\models\repository;

use Application\models\entity\StudentPersonal;
use Application\models\helper\Validation;

class ExemploValidRepository
{
    private $result = [];
    
    public function __construct(StudentPersonal $obj)
    {
        $this->genre($obj->getIdGenre());
        $this->maritalStatus($obj->getIdMaritialStatus());
        $this->schooling($obj->getIdSchooling());
        $this->name($obj->getName());
        $this->rg($obj->getRg());
        $this->cpf($obj->getCpf());
        $this->birthDate($obj->getBirthDate());
        $this->phone1($obj->getPhone1());
        $this->email($obj->getEmail());
        $this->zipCode($obj->getZipCode());
        $this->road($obj->getRoad());
        $this->number($obj->getNumber());
        $this->district($obj->getDistrict());
        $this->city($obj->getCity());
        $this->state($obj->getState());    
    }

    private function genre($value)
    {
        if (empty($value)) {
            $this->result[] = "Gênero inválido";
        }
    }

    private function maritalStatus($value)
    {
        if (empty($value)) {
            $this->result[] = "Estado civil inválido";
        }
    }
    
    private function schooling($value)
    {
        if (empty($value)) {
            $this->result[] = "Escolaridade inválida";
        }
    }
    
    private function name($value)
    {
        $validation = new Validation();

        if (!$validation->name($value)) {
            $this->result[] = "Nome Inválido";
        }
    }
    
    private function rg($value)
    {
        if (empty($value)) {
            $this->result[] = "Rg inválido";
        }
    }
    
    private function cpf($value)
    {
        $validation = new Validation();

        if (!$validation->cpf($value)) {
            $this->result[] = "Cpf Inválido";
        }
    }
    
    private function birthDate($value)
    {
        $validation = new Validation();

        $date = explode('-', $value);

        if (isset($date[0]) && isset($date[1]) && isset($date[2])) {
            
            if ($validation->birthDate($date[0], $date[1], $date[2])) {
                $this->result[] = "Data de nascimento inválida";
            }

        } else {
            $this->result[] = "Data de nascimento inválida";            
        }
    }
    
    private function phone1($value)
    {
        $validation = new Validation();

        if (!$validation->phone($value)) {
            $this->result[] = "Celular inválido";
        }
    }
    
    private function email($value)
    {
        $validation = new Validation();

        if (!$validation->email($value)) {
            $this->result[] = "Email inválido";
        }
    }
    
    private function zipCode($value)
    {
        $validation = new Validation();

        if (!$validation->cep($value)) {
            $this->result[] = "Cep inválido";
        }
    }
    
    private function road($value)
    {
        if (empty($value)) {
            $this->result[] = "Endereço inválido";
        }
    }
    
    private function number($value)
    {
        $validation = new Validation();

        if (!$validation->number($value)) {
            $this->result[] = "Número inválido";
        }
    }
    
    private function district($value)
    {
        if (empty($value)) {
            $this->result[] = "Bairro inválido";
        }
    }
    
    private function city($value)
    {
        if (empty($value)) {
            $this->result[] = "Cidade inválida";
        }
    }
    
    private function state($value)
    {
        if (empty($value)) {
            $this->result[] = "Estado inválido";
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}
