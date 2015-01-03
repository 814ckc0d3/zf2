<?php
namespace Timeline\Model;

use Zend\Db\TableGateway\TableGateway;

class TimelineTable
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

    public function getTimeline($id)
    {
        $rowset = $this->tableGateway->select(array('id_timeline' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveTimeline(Timeline $timeline)
    {
        $data = array(
            'start_date' => $timeline->start_date,
            'end_date' => $timeline->end_date,
            'headline' => $timeline->headline,
            'text' => $timeline->text,            
            'media' => $timeline->media,
            'media_credit' => $timeline->media_credit,
            'media_caption' => $timeline->media_caption,
            'media_thumbnail' => $timeline->media_thumbnail,
            'type' => $timeline->type,
            'tag_id_tag' => $timeline->tag_id_tag
        );

        $id = $timeline->id_timeline;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getTimeline($id)) {
                $this->tableGateway->update($data, array('id_timeline' => $id));
            } else {
                throw new \Exception('Timeline id does not exist');
            }
        }
    }

    public function deleteTimeline($id)
    {
        $this->tableGateway->delete(array('id_timeline' => $id));
    }
}