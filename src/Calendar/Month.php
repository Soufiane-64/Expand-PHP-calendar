<?php


namespace Calendar;

class Month{

    public $days = ['Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag','Sonntag'];
    private  $months = ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
    public $month;
    public $year;




    /**
     * @param int $month month between 1 and 12
     * @param int $year
     * @throws \Exception
     */
    public function __construct(?int $month = null ,?int $year = null ){


            if($month === null || $month < 1 || $month > 12){
               $month = intval(date('m'));
            }
            if ($year === null){
                $year = intval(date('Y'));
            }
            $this->month = $month;
            $this->year = $year;
    }

    /**
     * first day of the Month
     * @return \DateTime
     */
    public function  getStartingDay() : \DateTime{
        return  new \DateTime( "$this->year-$this->month-01");
    }

    /**
     * return the month in letter (ex : Januar 2023)
     * @return string
     */
    public  function toString() : string{
        return $this->months[$this->month - 1].' '.$this->year;

    }

    /**
     * return the number of weeks in month
     * @return int
     */
    public  function getWeeks() : int {

        $start = $this->getStartingDay();

        $end   = (clone $start)-> modify('+1 month -1 day');
        $weeks =  intval($end->format('W')) - intval($start->format('W')) + 1;
        if ($weeks < 0){
            $weeks =  intval($end->format('W'));
        }

        return $weeks;
    }

    /**
     * if the day is  in the current month
     * @param \DateTime $date
     * @return bool
     */
    public function withinMonth( \DateTime $date) : bool{
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');

    }

    /**
     * returns next month
     * @return Month
     * @throws \Exception
     */
    public function nextMonth():Month{
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12){
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    /**
     * returns previous month
     * @return Month
     * @throws \Exception
     */
    public function previousMonth():Month{
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1){
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }

    public function today() : Month {
        $month = null;
        $year = null;
        return new Month($month, $year);
    }


}