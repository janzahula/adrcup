<?php

/**
 * Base presenter for all application presenters.
 */
namespace AdminModule;
use Nette\Environment;
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
protected function startup() {
        parent::startup();
        
        $user = Environment::getUser();
        if (!$user->isLoggedIn()) {
            $backlink = $this->getApplication()->storeRequest();
            $this->redirect(':Sign:in', array('backlink' => $backlink));
        }
    }
    public function actionLogout() {
        Environment::getUser()->logout();
        $this->flashMessage('Byl jste odhlášen z administrace');
        $this->redirect(':Sign:in');
    }
}
