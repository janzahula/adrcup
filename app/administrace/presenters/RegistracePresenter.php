<?php
namespace AdminModule;
/**
 * Description of RegistracePresenter
 *
 * @author jan
 */


class RegistracePresenter extends BasePresenter {

    
    private $registration;

    public function inject(\Adrenalincup\Registration $registration) {
        $this->registration = $registration;
        
    }
    
    protected function startup() {
        parent::startup();
        
    }

    public function actionDefault() {
        
    }

    public function renderDefault() {
        
    }
    public function renderKompletni(){
        
        $this->template->registrace = $this->registration->getAllComplete()->fetchPairs('id');
    }
    
    public function renderNekompletni(){
        $this->template->registrace = $this->registration->getAllIncomplete()->fetchPairs('id');
    
    }
    public function renderHledam(){
        
        $this->template->registrace = $this->registration->getAllLookingFor()->fetchPairs('id');
    }
    

}