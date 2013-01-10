<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Node
 *
 * @author jan
 */
class Node {
    public $node_id;
    public $level;
    public $type;
    public $children;
    public $title_cz;
    public $position;


    function __construct($a) {
        $this->node_id = $a->id;
        $this->level = $a->level;
        $this->type = $a->type;
        $this->title_cz = $a->title;
        $this->position = $a->position;
        //$this->children = $a->children;
    }
    
    public function numberOfColumns(){
        $res = 0;
        $hasSimpleChildren = FALSE;
        foreach ($this->children as $ch) {
            if($ch->type == 'default'){
                $hasSimpleChildren = TRUE;
            }
            else if($ch->type == 'folder' || $ch->type == 'drive'){
                $res++;
            }
            
        }
        if($hasSimpleChildren == TRUE){
            $res++;
        }
        return $res;
        
    }
}

?>
