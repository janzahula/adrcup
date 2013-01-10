<?php

/**
 * Base presenter for all application presenters.
 */
include 'ChromePhp.php';

use Nette\Environment;

abstract class BasePresenter extends \Nette\Application\UI\Presenter {

    private $tree;

    public function injectTree(\Adrenalincup\Tree $tree) {
        $this->tree = $tree;
    }

    protected function startup() {
        parent::startup();

        $this->template->item = $this->constructMenu();
    }
    function cmp($a, $b) {
        if ($a->position == $b->position) {
            return 0;
        }
        return ($a->position < $b->position) ? -1 : 1;
    }
    private function constructMenu() {
        $root = new Node($this->tree->findByTreeId(2));
        $root->children = array();
        $topLevel = $this->tree->findByParentId($root->node_id);

        foreach ($topLevel as $node) {
            $firstLevelNode = new Node($node);
            $firstLevelNode->children = array();
            $secondLevelNodes = $this->tree->findByParentId($firstLevelNode->node_id);
            foreach ($secondLevelNodes as $secondNode) {
                $secondLevelNode = new Node($secondNode);
                $secondLevelNode->children = array();
                $thirdLevelNodes = $this->tree->findByParentId($secondLevelNode->node_id);
                foreach ($thirdLevelNodes as $thirdNode) {
                    $thirdLevelNode = new Node($thirdNode);
                    $thirdLevelNode->children = NULL;
                    array_push($secondLevelNode->children, $thirdLevelNode);
                }
                usort($secondLevelNode->children, array($this, 'cmp'));
                array_push($firstLevelNode->children, $secondLevelNode);
            }
            usort($firstLevelNode->children, array($this, 'cmp'));
            array_push($root->children, $firstLevelNode);
        }
        usort($root->children, array($this, 'cmp'));

        return $root;
    }

    

}
