 
<?php 
	if (!is_user_logged_in()) {
		redirect_to('/index.php');
	}
	if(isset($_POST['submit'])){ 
		 
		redirect_to('/index.php');
		 
	} 
?>
        <div id="CartTable" class="container">
            <div class="container Menucontent">        
                <hr class="separetor3">        
                <h2>Продажа</h2>                
                <h4>Оформление продажи</h4>
				<h4>После оформления заказа, вам на Email придет письмо о готовности к выдачи, после чего, вам необходимо будет придти по адресу г. Челябинск, ул Молдавская, д. 17а.</h4>
				<h4>Заказ оплачивается на месте выдачи.</h4>
				<form method="post" action="sale.php"> 
				<?php if(isset($_SESSION['cart'])&&($_SESSION['cart'])){ ?>
				<button class="input3" type="submit" name="submit">Подтверждение оформления</button> 
				<?php 
					
				}else{ 
					
					echo "<p>Корзина Пуста</p>"; 
					
				} 
			
				?>
				