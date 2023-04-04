<HTML>
  <HEAD>
    <?php
	  session_start();
	  include("csslink.php");
	  include("../class/dataclass.php");
	?>
	
	<?php
	  $feedbackdate="";
	  $regid="";
	  $ratingstar="";
	  $feedbackfor="";
	  $msg="";
	  $_SESSION["regid"]=2;
	  $dc=new DataClass();
	?>
	
	<?php
	    if(isset($_POST["btnsub"]))
	  {
		 $regid=$_SESSION["regid"];
         $feedbackdate=date('y-m-d');
		 $ratingstar=$_POST["rdoratingstar"];
		 $feedbackfor=$_POST["txtfeedbackfor"];
		 $query="insert into feedback(feedbackdate,regid,ratingstar,regid,feedbackfor) values('$feedbackdate','$regid','$ratingstar','$regid','$feedbackfor')"; 
	 		 
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		     $msg="FEEDBACK Submit Successfully...";
		  }
		  else
		  {
		    $msg="Record not saved...";
		  }
		 }
	   
	  
	  if(isset($_POST["btncancel"]))
	  {
		 header("location:customerhome.php");
	  }
	  
	?>
	
  </HEAD>
  
  <BODY>
    <form name="frm" action="#" method="post"> 
   <?php
         include("header.php");   
   ?>
    <div class="container-fluid" style="background-image:url('img/background1.jpg')">
	   	<div class="row" style="margin-top:20px">
		   <div class="col-md-3"></div>
			<div class="col-md-6">
			 <div class="control-group">
                <div class="controls">
				   <h3>CUSTOMER FEEDBACK</h3>
			   </div>
	         </div> 	
				
			 
			 <div class="control-group">
                <div class="controls">
				   <label>Rating</label> 
			       <input type="radio" name="rdoratingstar" value="1" /> 1 &nbsp;&nbsp; 
				   <input type="radio" name="rdoratingstar" value="2" /> 2 &nbsp;&nbsp; 
				   <input type="radio" name="rdoratingstar" value="3" /> 3 &nbsp;&nbsp; 
				   <input type="radio" name="rdoratingstar" value="4" /> 4 &nbsp;&nbsp; 
				   <input type="radio" name="rdoratingstar" value="5" checked /> 5 &nbsp;&nbsp; 
			   </div>
	         </div> 
                <div class="control-group">
                <div class="controls">
				   <label>feedbackfor</label> 
			       <input type="text" class="form-control" name="txtfeedbackfor" placeholder="Enter feedbackfor" value="" />
			   </div>
	         </div> 
			 
		   
			 <div class="control-group" style="margin-top:10px">
                <div class="controls">
	               <button type="submit" name="btnsub" class="btn btn-primary">Submit</button>			   
				   <button type="submit" name="btncal" class="btn btn-primary">Cancel</button>			   
			      </div>
	         </div> 
			 
			 <div class="control-group">
                <div class="controls">
				   <label><?php echo($msg) ?></label> 
			     </div>
	         </div> 
				
			</div>
		</div>
	 </div>	

  
   <?php
     include("footer.php");
	?>
  
  
   </form>
   <?php
	  include("jslink.php");
	?>
  </BODY>
</HTML>