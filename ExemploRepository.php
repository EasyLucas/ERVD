<?php
namespace Application\models\repository;

use Application\core\Model;
use Application\models\dao\ExemploDAO;

class ExemploRepository extends Model
{
    private $dao;

    public function __construct($objDbSystem = false)
    {
        if ($objDbSystem) {
            $this->dbSystem = $objDbSystem; 
        } else {
            $this->buildDbSystem();
        }

        $this->dao = new ExemploDAO($this->dbSystem);
    }

    public function getListIds()
    {   
        return $this->dao->findListIds();
    }

    public function getById($id)
    {
        return $this->dao->findById($id);
    }     
}
