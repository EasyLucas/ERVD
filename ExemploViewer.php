<?php
namespace Application\models\viewer;

use Application\models\entity\Exemplo;
use Application\models\repository\ExemploRepository;

class ExemploViewer
{
    private $type = "no-array";
    private $objectList = [];
    private $object;
    
    public function loadObj($id)
    {
        $objRepository = new ExemploRepository();
        $result = $objRepository->getById($id);

        $obj = new Exemplo();

        if ($result) {
            $obj->setId($result->id);
            $obj->setName($result->name);
        }

        if ($this->type == "no-array") {
            $this->object = $obj;
        } else {
            $this->objectList[] = $obj;
        }
    }
    
    public function buildToList(array $list)
    {
        $this->type = "array";
        
        array_walk($list, [$this, 'loadObj']);
    }    
    
    public function getObjectList()
    {
        return $this->objectList;
    }

    public function getObject()
    {
        return $this->object;
    }
}
