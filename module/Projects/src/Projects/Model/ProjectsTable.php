<?php
namespace Projects\Model;

use Zend\Db\TableGateway\TableGateway;

class ProjectsTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getProjects($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveProjects(Projects $projects)
    {
        $data = array(
            'description' => $projects->description,
            'title'  => $projects->title,
        );

        $id = (int) $projects->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getProjects($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Project id does not exist');
            }
        }
    }

    public function deleteProjects($id)
    {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}