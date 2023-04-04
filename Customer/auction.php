<HTML>
<HEAD>
   <?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
	<?php
	    $auctionid="";
		$auctiondate="";
		$prdid="";
		$custid="";
		$price="";
		$description="";
		$msg="";
	    $dc=new DataClass();
	?>
		<?php
	
	
	 if(isset($_POST["btnsubmit"]))
	  {
	     $auctionid=$dc->primary("select max(auctionid) from auction");
		 $auctiondate=date('y-m-d');
		 $prdid=$_SESSION["prdid"]; 
		 $custid=$_SESSION["regid"]; 
		 $price=$_POST["txtprice"];
		 $description=$_POST["txtdescription"];
		 $query="insert into auction(auctionid,auctiondate,prdid,custid,price,description) values('$auctionid','$auctiondate','$prdid','$custid','$price','$description')"; 
		
		$result=$dc->saveRecord($query);
		
		if($result)
		{
		    $msg="Auction Save Successfully ...";
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
 <div="wrapper">
 <?php
 include("header.php");
?>

 <div class="container">
	<div class="row"style="margin-top:20px">
         <div class="col-md-2"></div>
	     <div class="col-md-8"> <h3>AUCTION DETAILS</h3> </div>
	  </div>
	  
	  <div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
		
		<div class="form-group">
			<label>price</label>
			<input type="text" class="form-control" name="txtprice" value="<?php echo($price) ?>" placeholder="Enter price" onChange='onlynumber(this,lblprice)' autofocus >
		    <label id="lblprice" class="errmsg"></label>
		</div>
		<div class="form-group">
			<label>description</label>
			<input type="text" class="form-control" name="txtdescription" value="<?php echo($description) ?>" placeholder="Enter description" onChange='checkblank(this,lbldescription)'>
		    <label id="lblstateid" class="errmsg"></label>
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-success" name="btnsubmit" value="SUBMIT">
			<input type="submit" class="btn btn-danger" name="btncancel" value="CANCEL">
		</div>
	 	<div class="form-group"> <?php echo($msg) ?>  </div>
			
		</div>
	</div>
	</div>
<?php	
 include("footer.php");
?>
</div>	
	
</form>
<?php
 include("jsfiles.php");
?>
</BODY>
</HTML>