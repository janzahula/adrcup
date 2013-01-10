<?php

use \Nette\Application\UI\Form;

namespace AdminModule;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    private $article;
    private $galerie;

    public function inject(\Adrenalincup\Article $article, \Adrenalincup\Galerie $galerie) {
        $this->article = $article;
        $this->galerie = $galerie;
    }

    public function actionGetByTreeId() {
        $article = $this->article->findByTreeId($this->presenter->getParam('treeId'));
        $this->payload->title_cz = $article->title_cz;
        $this->payload->title_en = $article->title_en;
        $this->payload->text_cz = $article->text_cz;
        $this->payload->text_en = $article->text_en;
        $this->payload->hidden_id = $article->id;


        $this->sendPayload();
    }

    public function actionSaveGalleryForId() {

        $id = $this->presenter->getParam('article_id');

        $gallery_dir = "images/galerie/" . $id;


        if (!is_dir($gallery_dir)) {
            mkdir($gallery_dir, 0777);
        }

        $iter = 1;
        $uploadFolder = array_diff(scandir('upload/uploads'), array(".", "..", ".DS_Store"));

        foreach ($uploadFolder AS $fileName) {
            $newFileName = $fileName;
            if (file_exists($gallery_dir . "/" . $id . "_" . $newFileName)) {
                $willBeNamed = time() . $newFileName;
                copy('upload/uploads/' . $newFileName, 'upload/uploads/' . $willBeNamed);
                unlink('upload/uploads/' . $newFileName);
                $newFileName = $willBeNamed;
            }
            $iter++;
            $newFilePath = $gallery_dir . "/" . $newFileName;
            $this->galerie->uploadPhoto($newFileName, $newFilePath);
            $photoData['id'] = $id . "_" . $newFileName;
            $photoData['date'] = date("m/d/y g:i A");
            $photoData['article_id'] = $id;
            $this->galerie->savePhoto($photoData);
        }
        $this->redirect('homepage');
    }

    public function actionNotSaveGalleryForId() {
        $uploadFolder = array_diff(scandir('upload/uploads'), array(".", "..", ".DS_Store"));
        foreach ($uploadFolder AS $fileName) {

            unlink('upload/uploads/' . $fileName);
        }
        $this->redirect('homepage');
    }


    public function actionReloadPhotos() {

        $id = $this->presenter->getParam('article_id');

        $this->payload->photos = array();
        $photos = $this->galerie->getAllForArticle($id)->fetchPairs('id');
        $iter = 0;
        foreach ($photos as $photo) {
            $this->payload->photos[] = $photo->id;
            $iter++;
        }

        $this->sendPayload();
    }
    
    public function actionSaveArticle(){
         
        $params = array();
        $params['id'] = $this->getParam("article_id");
        $params['title_cz'] = $this->getParam("title_cz");
        $params['title_en'] = $this->getParam("title_en");
        $params['text_cz'] = $this->getParam("text_cz");
        $params['text_en'] = $this->getParam("text_en");
        $params['date'] = date("Y-m-d H:i:s");
          
        
        $this->article->save($params);
        $this->redirect('homepage');
    }


    public function renderDefault() {
        
        $this->template->anyVariable = 'any value';
    }

    protected function createComponentTaskForm() {
        $form = new \Nette\Application\UI\Form();
        $form->addText('title_cz', "Nadpis sekce");
        $form->addTextArea('text_cz', '')
        ->controlPrototype->addClass('ckedit');
        $form->addText('title_en', "Nadpis sekce(anglicky)");
        $form->addTextArea('text_en', '')
        ->controlPrototype->addClass('ckedit');
        
        $form->addButton('create', 'Uložit')
        ->controlPrototype->addClass('button save');
        
        return $form;
    }

}
