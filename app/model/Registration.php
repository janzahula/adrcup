<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GalerieModel
 *
 * @author jan
 */

namespace Adrenalincup;

use Nette\Image;

class Registration extends Base {

    protected function getTable() {
        // název tabulky odvodíme z názvu třídy

        return $this->connection->table("registration");
    }

     
    public function getForId($id){
        $this->getTable()->where('id', $id);
    }

    public function getAll() {
        return $this->getTable();
    }

    public function getAllComplete(){
        return $this->getTable()->where(array('incomplete_team' => 0, 'looking_for' => 0));
    }
    
    public function getAllIncomplete(){
        return $this->getTable()->where(array('incomplete_team' => 1, 'looking_for' => 0));
    }
    public function getAllLookingFor(){
        return $this->getTable()->where(array('incomplete_team' => 0, 'looking_for' => 1));
    }
}
