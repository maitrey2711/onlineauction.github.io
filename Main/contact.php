<HTML>
  <HEAD>
   <?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
	<style type="text/css">
	 .form-control{padding:20px!important;margin-bottom:5px!important}
	</style>
  </HEAD>
  
  
  <BODY>
    <form name="frm" action="#" method="post"> 
    <?php
   include("header.php");
  
  ?>
    <div class="container-fluid" style="background-image:url('img/background1.jpg')">
	   	<div class="row" style="padding-top:50px">
		    <div class="col-md-3"></div>
			<div class="col-md-6"> <h3>Contact US</h3>	 </div>
		</div>
		  <div class="row" style="margin-bottom:0px;padding-bottom:10px" >
		    <div class="col-md-3"></div>
			<div class="col-md-6">
			
			<div class="field your-name form-group">
			   <label>Person Name</label> 
			    <input type="text" name="txtpersonname" class="form-control"  placeholder="Enter Person Name" />
		    </div>
			
			 
		  
		  <div class="field form-group">
                
				   <label>Contact No</label> 
			       <input type="text" class="form-control" name="txtcontactno" placeholder="Enter Contact Number" value="" />
			   
	         </div> 
			 
			 <div class="form-group">
               
				   <label>Email Id</label> 
			       <input type="text" class="form-control" name="txtemailid" placeholder="Enter Email Address" value="" />
			  
	         </div> 
			 
			  <div class="form-group">
               
				   <label>Details</label> 
				   <textarea name="txtdetails" class="form-control" rows="3"> </textarea>
			     
	         </div> 
			 
			 <div class="form-group" style="margin-top:10px">
               
	               <button type="submit" name="btnsub" class="btn btn-primary">Submit</button>			   
				   <button type="submit" name="btncal" class="btn btn-primary">Cancel</button>			   
			    
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