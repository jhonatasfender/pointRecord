<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class PointTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getPonto($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function savePonto(Point $ponto) {
        $data = array(
            'entry_time' => $ponto->entry_time,
            'departure_time_for_lunch' => $ponto->departure_time_for_lunch,
            'entry_time_lunch' => $ponto->entry_time_lunch,
            'exit_time' => $ponto->exit_time,
            'total_hours_day' => $ponto->total_hours_day,
            'daley' => $ponto->daley,
            'overtime' => $ponto->overtime
        );
        $id = (int) $ponto->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getPonto($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception("Ponto id does not exist");
            }
        }
    }

    public function deletePonto($id) {
        $this->tableGateway->delete(array('id' => (int) $id));
    }

}
