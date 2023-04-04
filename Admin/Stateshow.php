<HTML>
<HEAD>
<?php
 session_start();
 include("../class/DataClass.php");
 include("csslink.php");
?>

<?php
	    $msg="";
		$dc=new DataClass();
	?>
	<?php
	  if(isset($_POST["btnnew"]))
	  {
		$_SESSION["trans"]="new";  
	    header("location:stateform.php");
	  }
	
	  if(isset($_POST["btnupdate"]))
	  {
		$_SESSION["trans"]="update";  
		$_SESSION["id"]=$_POST["btnupdate"];
	    header("location:stateform.php");
	  }
	  if(isset($_POST["btndelete"]))
	  {
		  $stateid=$_POST["btndelete"];
		  $query="delete from state where stateid='$stateid'";
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		    $msg="Record Deleted";
		  }
		  		  
	  }
	?>
	
</HEAD>
<BODY class="fixed-nav sticky-footer bg-dark" id="page-top">
<form name="frm" action="#" method="post">
 
 <?php
 include("navbar.php");
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
		<div class="col-xl-12">
		 <h3>STATE DETAILS
            <button type='submit' class="btn btn-primary pull-right"  name='btnnew'>NEW</button>
			</h3>
		</div>
	</div>	
		 <div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">
		     <?php
			   $query="select stateid,statename,shortname from state";
			   $tb=$dc->getTable($query);
			   echo("<table class='table table-bordered'>");
			   echo("<tr>");
			     echo("<th>ID</th>");
				 echo("<th>NAME</th>");
				 echo("<th>SHORTNAME</th>");
				 echo("<th>DELETE</th>");
				 echo("<th>UPDATE</th>");
			     echo("</tr>");
			   while($rw=mysqli_fetch_array($tb))
			   {
				  echo("<tr>");
			      echo("<td>".$rw['stateid']."</td>");
				  echo("<td>".$rw['statename']."</td>");
				  echo("<td>".$rw['shortname']."</td>");
			      echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['stateid']."'>DELETE</button></td>");
				   echo("<td><button type='submit' class='btn btn-success' name='btnupdate' value='".$rw['stateid']."'>UPDATE</button></td>");
				  
				  echo("</tr>");
			   }
	           echo("<td colspan='6'>".$msg."</td>");
			   echo("</table>");
	         ?>		
		     
		</div>
	</div>
	<?php
 include("footer.php");
?>
</div>
</div>	
	
</form>
<?php
 include("jslink.php");
?>
</BODY>
</HTML>