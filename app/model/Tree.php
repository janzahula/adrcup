<?php

namespace Adrenalincup;

use Nette;

class Tree extends Base {

    protected function getTable() {
        // název tabulky odvodíme z názvu třídy

        return $this->connection->table("tree");
    }

    public function findByTreeId($id) {
        return $this->findBy(array('id' => $id))->fetch();
    }
    
    public function findByParentId($id) {
        return $this->findBy(array('parent_id' => $id))->fetchPairs('id');
    }
}
