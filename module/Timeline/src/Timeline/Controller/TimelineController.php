<?php
namespace Timeline\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Timeline\Model\Timeline;          
use Timeline\Form\TimelineForm;

class TimelineController extends AbstractActionController
{
    protected $timelineTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'timelines' => $this->getTimelineTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new TimelineForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $timeline = new Timeline();
//             \Zend\Debug\Debug::dump($form);
            $form->setInputFilter($timeline->getInputFilter());
            $form->setData($request->getPost());
//                         \Zend\Debug\Debug::dump($request->getPost());
            
            
            if ($form->isValid()) {               
                $timeline->exchangeArray($form->getData());
                $this->getTimelineTable()->saveTimeline($timeline);
        
                // Redirect to list of albums
                return $this->redirect()->toRoute('timeline');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('timeline', array(
                'action' => 'add'
            ));
        }
        
        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $timeline = $this->getTimelineTable()->getTimeline($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('timeline', array(
                'action' => 'index'
            ));
        }
        
        $form  = new TimelineForm();
        $form->bind($timeline);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($timeline->getInputFilter());
            $form->setData($request->getPost());
        
            if ($form->isValid()) {
                $this->getTimelineTable()->saveTimeline($timeline);
        
                // Redirect to list of albums
                return $this->redirect()->toRoute('timeline');
            }
        }
        
        return array(
            'id_timeline' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('timeline');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
        
            if ($del == 'Yes') {
                $id = $request->getPost('id_timeline');
                $this->getTimelineTable()->deleteTimeline($id);
            }
        
            // Redirect to list of albums
            return $this->redirect()->toRoute('timeline');
        }
        
        return array(
            'id_timeline'    => $id,
            'timeline' => $this->getTimelineTable()->getTimeline($id)
        );
    }
    
    // module/Album/src/Album/Controller/AlbumController.php:
    public function getTimelineTable()
    {
        if (!$this->timelineTable) {
            $sm = $this->getServiceLocator();
            $this->timelineTable = $sm->get('Timeline\Model\TimelineTable');
        }
        return $this->timelineTable;
    }
}