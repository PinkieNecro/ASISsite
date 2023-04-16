 
<?php 
	if (!is_user_logged_in()) {
		redirect_to('/index.php');
	}
	require("/../../../auth/src/libs/CartConnection.php"); 
	if(isset($_GET['page'])){ 
		 
		$pages=array("products", "cart"); 
		 
		if(in_array($_GET['page'], $pages)) { 
			 
			$_page=$_GET['page']; 
			 
		}else{ 
			 
			$_page="products"; 
			 
		} 
		 
	}else{ 
		 
		$_page="products"; 
		 
	} 
?>
<div id="container"> 
 
    <div id="main"> 
        
        <?php require($_page.".php"); ?> 

    </div><!--end of main--> 
    
    <div id="sidebar"> 
        
    </div><!--end of sidebar--> 

</div><!--end container--> 