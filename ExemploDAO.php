<?php
namespace Application\models\dao;

use Application\models\helper\DataAccessObject;

class ExemploDAO
{
    private $dataAccessObject;

    public function __construct($database)
    {
        $this->dataAccessObject = new DataAccessObject($database);
    }

    public function findListIds()
    {
        $resultStmt = $this->dataAccessObject->select("SELECT id FROM exemplo");

        if (is_object($resultStmt)) {
            return array($resultStmt->id);
        }

        $array = [];
        
        foreach ($resultStmt as $key => $value) {
            $array[] = $value->id;
        }        

        return $array;
    }    

    public function findById($id)
    {
        $resultStmt = $this->dataAccessObject->select(
            "SELECT * FROM exemplo WHERE id = :id",
            [
                "id" => $id,
            ]
        );

        return $resultStmt;
    }
}
