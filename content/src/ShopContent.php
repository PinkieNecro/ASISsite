<?php 
 
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		 
		$id=intval($_GET['id']); 
		$message="Продукт добавлен в корзину";  
		if(isset($_SESSION['cart'][$id])){ 
			 
			$_SESSION['cart'][$id]['quantity']++; 
			 
		}
        else
        { 
			$row_s=AddCart($id); 
            $_SESSION['cart'][$row_s['id']]=array( 
            "quantity" => 1, 
            "price" => $row_s['cost'] );	 
		} 		 
	} 
 
?> 
        <div id="shop" class="container">
            <div class="container Menucontent">        
                <hr class="separetor3">        
                <h2>Магазин</h2>                
                <h3>Список товаров и услуг на продажу:</h3> 
                <?php  if (!is_user_logged_in()) { ?><h3>Корзина доступна только после входа в свою учетную запись.</h3><?php } ?> 
                <?php 
                    if(isset($message)){ 
                        echo "<h6>$message</h6>"; 
                    } 
                ?>
                <h3>Услуги:</h3> 
                    <div class="container">
                    <?php
                        foreach (GetProcuct(1) as $row){
                    ?>
                        <div class="col-md-3 Productborder"> 
                            <div class="row">
                                <image src="<?php echo $row['img_link'] ?>" class="ProductImage" width="90%">
                                <h5><?php echo $row['name'] ?></h5> 
                                <h5><?php echo $row['description'] ?></h5> 
                                <h5><?php echo $row['cost'] ?>₽</h5> 
                                <?php  if (is_user_logged_in()) { ?><a class="input3" href="/Shop.php?&action=add&id=<?php echo $row['id'] ?>">Добавить в корзину</a><?php } ?> 
                            </div>
                        </div>
                    <?php
                        }
                    ?> 
                    </div>
                    <h3>Сканеры штрихкодов:</h3> 
                    <div class="container">
                    <?php
                        foreach (GetProcuct(2) as $row){
                    ?> 
                        <div class="col-md-3 Productborder"> 
                            <div class="row">
                                <image src="<?php echo $row['img_link'] ?>" class="ProductImage" width="90%">
                                <h5><?php echo $row['name'] ?></h5> 
                                <h5><?php echo $row['description'] ?></h5> 
                                <h5><?php echo $row['cost'] ?>₽</h5> 
                                <?php  if (is_user_logged_in()) { ?><a class="input3" href="/Shop.php?&action=add&id=<?php echo $row['id'] ?>">Добавить в корзину</a><?php } ?> 
                            </div>
                        </div>
                    <?php
                        }
                    ?> 
                    </div>
                    <h3>Принтеры:</h3>    
                    <div class="container">
                    <?php
                        foreach (GetProcuct(3) as $row){
                    ?>  
                        <div class="col-md-3 Productborder"> 
                            <div class="row">
                                <image src="<?php echo $row['img_link'] ?>" class="ProductImage" width="90%">
                                <h5><?php echo $row['name'] ?></h5> 
                                <h5><?php echo $row['description'] ?></h5> 
                                <h5><?php echo $row['cost'] ?>₽</h5> 
                                <?php  if (is_user_logged_in()) { ?><a class="input3" href="/Shop.php?&action=add&id=<?php echo $row['id'] ?>">Добавить в корзину</a><?php } ?> 
                            </div>
                        </div>
                    <?php
                        }
                    ?> 
                    </div>     
                    <h3>Фискальные накопители:</h3>
                    <div class="container">
                    <?php
                        foreach (GetProcuct(4) as $row){
                    ?>
                        <div class="col-md-3 Productborder"> 
                            <div class="row">
                                <image src="<?php echo $row['img_link'] ?>" class="ProductImage" width="90%">
                                <h5><?php echo $row['name'] ?></h5> 
                                <h5><?php echo $row['description'] ?></h5> 
                                <h5><?php echo $row['cost'] ?>₽</h5> 
                                <?php  if (is_user_logged_in()) { ?><a class="input3" href="/Shop.php?&action=add&id=<?php echo $row['id'] ?>">Добавить в корзину</a><?php } ?> 
                            </div>
                        </div>
                    <?php
                        }
                    ?> 
                    </div>          
            </div>
        </div>