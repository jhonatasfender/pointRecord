<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    protected $pointTable;

    public function indexAction() {
        return new ViewModel();
    }

    public function getPointTable() {
        if (!$this->pointTable) {
            $sm = $this->getServiceLocator();
            $this->pointTable = $sm->get('Application\Model\PointTable');
        }
        return $this->pointTable;
    }

    public function listAction() {
        return new ViewModel(array(
            'point' => $this->getPointTable()->fetchAll()
        ));
    }

}
