<?php

namespace Adrenalincup;

use Nette;

class Article extends Base {

    protected function getTable() {
        // název tabulky odvodíme z názvu třídy

        return $this->connection->table("article");
    }

    public function save($data){
        $this->getTable()->where('id', $data['id'])->update($data);
        $article = $this->findBy(array('id' => $data['id']))->fetch();
        $this->connection->table('tree')->where('id', $article->tree_id)->update(array("title" => $article->title_cz));
    }

        public function findByTreeId($id) {
        return $this->findBy(array('tree_id' => $id))->fetch();
    }

    public function createArticleForNode($data){
        
        $this->getTable()->insert($data);
    }
    
    public function updateArticleForTreeId($data){
        $this->getTable()->where('tree_id', $data['tree_id'])->update($data);
    }
    
    public function deleteFile($id){
        $article = $this->findByTreeId($id);
        
        $photos = $this->connection->table('photo')->where('article_id', $article->id)->fetchPairs('id');
        
        foreach ($photos as $p) {
            //return "jsem tu";
            $this->connection->table('photo')->where("id", $p->id)->delete();
        }
        
        $article->delete();
    }
    public function deleteFolder($id){
        
        $treeNodes = $this->connection->table("tree")->where("parent_id",$id)->fetchPairs('id');
        
        foreach ($treeNodes as $node) {
            $this->deleteFile($node->id);
        }
    }
}
