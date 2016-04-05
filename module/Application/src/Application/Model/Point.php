<?php

namespace Application\Model;

class Point {

    public $id;
    public $entry_time;
    public $departure_time_for_lunch;
    public $entry_time_lunch;
    public $exit_time;
    public $total_hours_day;
    public $daley;
    public $overtime;

    public function exchangeArray($data) {
        $this->entry_time = (!empty($data['entry_time'])) ? $data['entry_time'] : null;
        $this->departure_time_for_lunch = (!empty($data['departure_time_for_lunch'])) ? $data['departure_time_for_lunch'] : null;
        $this->entry_time_lunch = (!empty($data['entry_time_lunch'])) ? $data['entry_time_lunch'] : null;
        $this->exit_time = (!empty($data['exit_time'])) ? $data['exit_time'] : null;
        $this->total_hours_day = (!empty($data['total_hours_day'])) ? $data['total_hours_day'] : null;
        $this->daley = (!empty($data['daley'])) ? $data['daley'] : null;
        $this->overtime = (!empty($data['overtime'])) ? $data['overtime'] : null;
    }

}
