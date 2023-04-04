<?php
  class DataClass
  {
      public $conn;
      public $message;
	  
     public function __construct() 	  
	 {
	  $this->conn=mysqli_connect("localhost","root","","onlineauction");
	 }
	 
	  public function getTable($query) //select * from product 
	  {
        $tb=mysqli_query($this->conn,$query);
		return $tb;
	  }	 
	  
	  public function getRecord($query) // select * from register where regid=1
	  {
        $tb=mysqli_query($this->conn,$query);
		$rw=mysqli_fetch_array($tb);
		return $rw;
	 }	 
	 
	  public function saveRecord($query) //insert or update or delete
	  {
	   $result=mysqli_query($this->conn,$query);
	   return $result;
	  }
		 
	  public function getData($query)
	 {
        $data="";
		$tb=mysqli_query($this->conn,$query);
		$rw=mysqli_fetch_array($tb);
		if($rw)
		{
		  $data=$rw[0];
		}
		return $data;
	 }	 
	  public function primary($query) 
	 {
        $tb=mysqli_query($this->conn,$query);
		$rw=mysqli_fetch_array($tb);
		
		if($rw)
		  $pk=$rw[0]+1;
	    else
          $pk=1;			
		  
		return $pk;
	 }
  }
?>