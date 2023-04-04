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
	    header("location:cityform.php");
	  }
	
	  if(isset($_POST["btnupdate"]))
	  {
		$_SESSION["trans"]="update";  
		$_SESSION["id"]=$_POST["btnupdate"];
	    header("location:cityform.php");
	  }
		 if(isset($_POST["btndelete"]))
	  {
		  $cityid=$_POST["btndelete"];
		  $query="delete from city where cityid='$cityid'";
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
		 <h3>CITY DETAILS
            <button type='submit' class="btn btn-primary pull-right"  name='btnnew' value="new">NEW</button>
			</h3>
		</div>
	</div>	
		 <div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">
		     <?php
			   $query="select cityid,cityname,shortname,stateid from city";
			   $tb=$dc->getTable($query);
			   echo("<table class='table table-bordered'>");
			   echo("<tr>");
			     echo("<th>ID</th>");
				 echo("<th>NAME</th>");
				 echo("<th>SHORTNAME</th>");
				 echo("<th>STATEID</th>");
				 echo("<th>DELETE</th>");
				 echo("<th>UPDATE</th>");
				 echo("</tr>");
			   while($rw=mysqli_fetch_array($tb))
			   {
				  echo("<tr>");
			      echo("<td>".$rw['cityid']."</td>");
				  echo("<td>".$rw['cityname']."</td>");
				  echo("<td>".$rw['shortname']."</td>");
				  echo("<td>".$rw['stateid']."</td>");
			      echo("<td><button type='submit' class='btn btn-danger' name='btndelete' value='".$rw['cityid']."'>DELETE</button></td>");
				   echo("<td><button type='submit' class='btn btn-success' name='btnupdate' value='".$rw['cityid']."'>UPDATE</button></td>");
				  
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