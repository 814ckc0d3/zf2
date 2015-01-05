<?php
namespace Projects\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Projects\Model\Projects;          
use Projects\Form\ProjectsForm;

class ProjectsController extends AbstractActionController
{
    protected $ProjectsTable;
    
    public function indexAction()
    {
        return new ViewModel(array(
            'projects' => $this->getProjectsTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new ProjectsForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $projects = new Projects();
            $form->setInputFilter($projects->getInputFilter());
            $form->setData($request->getPost());
        
            if ($form->isValid()) {
                $projects->exchangeArray($form->getData());
                $this->getProjectsTable()->saveProjects($projects);
        
                // Redirect to list of albums
                return $this->redirect()->toRoute('projects');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('projects', array(
                'action' => 'add'
            ));
        }
        
        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $projects = $this->getProjectsTable()->getProjects($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('projects', array(
                'action' => 'index'
            ));
        }
        
        $form  = new ProjectsForm();
        $form->bind($projects);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($projects->getInputFilter());
            $form->setData($request->getPost());
        
            if ($form->isValid()) {
                $this->getProjectsTable()->saveProjects($projects);
        
                // Redirect to list of albums
                return $this->redirect()->toRoute('projects');
            }
        }
        
        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('projects');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
        
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getProjectsTable()->deleteProjects($id);
            }
        
            // Redirect to list of albums
            return $this->redirect()->toRoute('projects');
        }
        
        return array(
            'id'    => $id,
            'projects' => $this->getProjectsTable()->getProjects($id)
        );
    }
    
    // module/Album/src/Album/Controller/AlbumController.php:
    public function getProjectsTable()
    {
        if (!$this->ProjectsTable) {
            $sm = $this->getServiceLocator();
            $this->ProjectsTable = $sm->get('Projects\Model\ProjectsTable');
        }
        return $this->ProjectsTable;
    }
}