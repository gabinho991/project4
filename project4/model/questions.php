<?php
class questions {
    
    private $qname;
    private $qbody;
    private $qskills;

    public function __construct($qname,$qbody,$qskills) {
        $this->qname = $qname;
        $this->qbody = $qbody;
        $this->qskills = $qskills;

    }

    public function getqname() {
        return $this->qname;
    }

    public function setqname($value) {
        $this->qname = $value;
    }

    public function getqbody() {
        return $this->qbody;
    }

    public function setqbody($value) {
        $this->qbody = $value;
    }
    public function getqskills() {
        return $this->qskills;
    }

    public function qskills($value) {
        $this->qskills = $value;
    }

}
?>