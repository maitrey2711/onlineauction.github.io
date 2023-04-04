<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include("../class/DataClass.php");
 ?>
 
 <?php
	    $prdid="";
		$prdname="";
		$adddate="";
		$startdate="";
		$expprice="";
		$details="";
		$enddate="";
		$filename="";
		$tmpname="";
		$company="";
		$regid="";
		$msg="";
	    $dc=new DataClass();
	?>
 
 <?php
	
    if(($_SESSION['regid'] == '') || (!isset($_SESSION['regid']))) 
    {
      $_SESSION['regid']=2;
	}
   
  
   if(isset($_POST["btnsave"]))
   {
		 $prdname=$_POST["txtprdname"]; 
		 $adddate=$_POST["txtadddate"]; 
		 $startdate=$_POST["txtstartdate"]; 
		 $enddate=$_POST["txtenddate"]; 
		 $expprice=$_POST["txtexpprice"];
		 $details=$_POST["txtdetails"];
		 $filename=$_FILES["fupprd"]["name"];
		 $tmpname=$_FILES["fupprd"]["tmp_name"];
		 $company=$_POST["txtcompany"];
		 $regid=$_SESSION["regid"];
		 
		 $prdid=$dc->primary("select max(prdid) from product");
		 $ext=pathinfo($filename,PATHINFO_EXTENSION);
	     $filename="product".$prdid.".".$ext;	
		 
		 $query="insert into product(prdid,prdname,adddate,startdate,expprice,details,enddate,image,company,regid) values('$prdid','$prdname','$adddate','$startdate','$expprice','$details','$enddate','$filename','$company','$regid')"; 
		 echo($query);
		 	 
		 $result=$dc->saveRecord($query);
		 if($result)
		 {
		  if(isset($_FILES['fupprd']))
	      {
	       move_uploaded_file($tmpname,"productimages/".$filename);
	      }
		   $msg="Product Add Successfully"; 
		 }
		  else
		  {
		    $msg="Record not saved...";
		  }
		 }
	   
	  
	  if(isset($_POST["btncancel"]))
	  {
		 header("location:owenerhome.php");
	  }
	?>
	

  
</HEAD>
<BODY>
 <form name="frm" action="#" method="post" enctype="multipart/form-data" >
<div id="wrapper">
<?php
 include("header.php");
?>

<div class="container">
   <div class="row">
     <div class="col-md-3"></div>
	 <div class="col-md-6"><h3>PRODUCT FORM</h3></div>
	</div>	
  
    <div class="row"style="margin-bottom:20px">
      
	  <div class="col-md-3"></div>
  	  <div class="col-md-6">
         <div class="form-group">
			<label>Product Name</label>
			<input type="text" class="form-control" name="txtprdname" value="<?php echo($prdname) ?>" placeholder="Enter product name" autofocus onChange='checkblank(this,lblprdname)'>
			<label id="lblprdname" class="errmsg"></label>
		</div>
		 <div class="form-group">
			<label>Product Add date</label>
			<input type="date" class="form-control" style="width:100%" name="txtadddate" value="<?php echo($adddate) ?>" >
		</div>
		 <div class="form-group">
			<label>Start Date</label>
			<input type="date" class="form-control" style="width:100%" name="txtstartdate" value="<?php echo($startdate) ?>"  >
		</div>
		
		<div class="form-group">
			<label>End Date</label>
			<input type="date" class="form-control" style="width:100%" name="txtenddate" value="<?php echo($enddate) ?>" placeholder="Enter enddate" autofocus onChange='checkblank(this,lblenddate)'>
			<label id="lblenddate" class="errmsg"></label>
		</div>
		
		 <div class="form-group">
			<label>Expected Price</label>
			<input type="text" class="form-control" name="txtexpprice" value="<?php echo($expprice) ?>" placeholder="Enter expprice" onChange='checkblank(this,lblexpprice)'>
			<label id="lblexpprice" class="errmsg"></label>
		</div>
		
		<div class="form-group">
			<label>Product Detail</label>
			<input type="text" class="form-control" name="txtdetails" value="<?php echo($details) ?>" placeholder="Enter Product Details">
			<label id="lbldetails" class="errmsg"></label>
		</div>
		
		<div class="form-group">
			<label>Product Image</label>
			<input type="file" name="fupprd" >
		</div>
		
		<div class="form-group">
			<label>Company</label>
			<input type="text" class="form-control" name="txtcompany" value="<?php echo($company) ?>" placeholder="Enter company" onChange='checkblank(this,lblcompany)'>
			<label id="lblcompany" class="errmsg"></label>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-success" name="btnsave" value="SAVE">
			<input type="submit" class="btn btn-danger" name="btncancel" value="CANCEL">
		</div>
		
		<div class="form-group">
		 <?php echo($msg); ?>
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
