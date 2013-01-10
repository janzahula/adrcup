<?php
 
/**
 * Description of Json
 *
 * @author jan
 */

class JsonPresenter extends AdminModule\BasePresenter {

    private $article;
    private $galerie;

    public function inject(\Adrenalincup\Article $article, \Adrenalincup\Galerie $galerie) {
        $this->article = $article;
        $this->galerie = $galerie;
    }

    protected function startup() {
        parent::startup();
        
    }

    public function actionDefault() {
        
    }

    public function renderDefault() {
        $params = array(
            'operation' => $this->getParam('operation'),
            'id' => $this->getParam('id'),
            'jstree_select' => $this->getParam('jstree_select'),
            'jstree_open' => $this->getParam('jstree_open'),
            'jstree_load' => $this->getParam('jstree_load'),
            'ref' => $this->getParam('ref'),
            'position' => $this->getParam('position'),
            'title' => $this->getParam('title'),
            'type' => $this->getParam('type'),
            'copy' => $this->getParam('copy'),
        );
         
        $container = $this->presenter->context;
        $httpResponse = $container->httpResponse;
        $httpResponse->setContentType('application/json', 'UTF-8');
        $httpResponse->setHeader('Connection', 'close');
        $httpResponse->setHeader('Cache-Control', 'no-cache, must-revalidate');
        $jsontree = new json_tree();

        $method_name = $this->getParam('operation');
        switch ($method_name) {
            case "get_children":
                $this->template->json = $jsontree->get_children($params);
                break;
            case "create_node":
                $this->template->json = $jsontree->create_node($params);
                break;
            case "set_data":
                $this->template->json = $jsontree->set_data($params);
                break;
            case "rename_node":
                $this->template->json = $jsontree->rename_node($params);
                break;
            case "move_node":
                $this->template->json = $jsontree->move_node($params);
                break;
            case "remove_node":

                if ($params['type'] == 'default') {
                    $this->article->deleteFile($params['id']);
                } else if ($params['type'] == 'folder' || $params['type'] == 'drive') {
                    $this->article->deleteFolder($params['id']);
                }
                $this->template->json = $jsontree->remove_node($params);

                break;
            default:
                $this->template->json = $jsontree->get_children($params);
                break;
        }
    }

    public function actionCreateFile() {
        $id = $this->getParam('node_id');
        $title = $this->getParam('title');
        $data = array();
        $data['tree_id'] = $id;
        $data['title_cz'] = $title;
        $this->article->createArticleForNode($data);
        $this->redirect('homepage');
    }
    public function actionDeleteImage(){
        $id = $this->getParam("image_id");
        $this->galerie->deletePhoto($id);
        $this->redirect("homepage");
    }

    public function actionRenameNode() {
        $id = $this->getParam('node_id');
        $title = $this->getParam('title');
        $data = array();
        $data['tree_id'] = $id;
        $data['title_cz'] = $title;
        $this->article->updateArticleForTreeId($data);
        $this->redirect('homepage');
    }

    
}