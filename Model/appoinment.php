<?php 
class appoinement {
public string $date ;
public string $time ;
public string $id_p ;
public string $id_d ;
public string $status ;
function __construct($date ,$time ,$id_p ,$id_d ,$status) 
{
    $this->date = $date;
    $this->time = $time;
    $this->id_p = $id_p;
    $this->id_d =$id_d ;
    $this->status = $status;
}

}


?>