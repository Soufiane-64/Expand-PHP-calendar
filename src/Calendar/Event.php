<?php

namespace  Calendar;
class Event{

    private $id;
    private $name;
    private $description;
    private  $start;
    private $end;


    public function  getId() : int{
        return $this->id;
    }
    public function  getName() : string{
        return $this->name;
    }
    public function  getDescription() : string{
        return $this->description ?? '';
    }
    public function  getStart() : \DateTime{
        return new \DateTime($this->start);
    }
    public function  getEnd() : \DateTime{
        return new \DateTime($this->end);
    }

}
