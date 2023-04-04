<HTML>
<HEAD>
<?php
 session_start();
 include("csslink.php");
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
		 <img src="img/admin1.jpg" style="width:100%">
		</div>
		</div>
		
		<div class="row" style="margin-top:10px">
		<div class="col-xl-12">
		<h4>Introduction to the Administration Panel</h4>
		<p style="text-align:justify">
		The Administration Panel is the primary tool for you to work with your online auction. Here you can manage Master Data,User Control. interact with your customers and Owner and do much more.
        The admin panel is responsive. it adapts to the screen size of the device you view it from. That way, you can manage your store from mobile devices.
       </p>
		</div>
		</div>
	</div>
	<?php
 include("footer.php");
?>
</div>	
	
</form>
<?php
 include("jslink.php");
?>
</BODY>
</HTML>