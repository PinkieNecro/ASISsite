 
<?php 
	if (!is_user_logged_in()) {
		redirect_to('/index.php');
	}
	if(isset($_POST['submit'])){ 
		 
		foreach($_POST['quantity'] as $key => $val) { 
			if($val==0) { 
				unset($_SESSION['cart'][$key]); 
			}else{ 
				$_SESSION['cart'][$key]['quantity']=$val; 
			} 
		} 
		 
	} 
?>
        <div id="CartTable" class="container">
            <div class="container Menucontent">        
                <hr class="separetor3">        
                <h2>Корзина</h2>                
                <h4>Содержимое корзины.</h4>
				<form method="post" action="cart.php"> 
				<table> 
      
 
					<?php 
					
						if(isset($_SESSION['cart'])&&($_SESSION['cart'])){ ?>
							<tr> 
								<th>Наименование</th> 
								<th>Количество</th> 
								<th>Цена</th> 
								<th>Общая цена</th> 
							</tr> 
							<?php 
							$totalprice=0;
							foreach (ShowCart() as $row){ 
								$subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['cost']; 
								$totalprice+=$subtotal; 
							?> 
							<tr> 
								<td><?php echo $row['name'] ?>
								<td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td> 
								<td><?php echo $row['cost'] ?>₽</td> 
								<td><?php echo $_SESSION['cart'][$row['id']]['quantity']*$row['cost'] ?>₽</td> 
							</tr> 
							<?php 
								
							} 
					?>  
					<tr> 
					<hr />
						<td colspan="4">Итоговая цена: <?php echo $totalprice ?>₽</td> 
					</tr> 
			
				</table> 
				<br /> 
				<button class="input3" type="submit" name="submit">Обновить корзину</button> 
				<a>Для удаления позиции обнулите ее и обновите корзину.</a>
				<?php 
					
				}else{ 
					
					echo "<p>Корзина Пуста</p>"; 
					
				} 
			
				?>