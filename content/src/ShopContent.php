        <div id="shop" class="container">
            <div class="container Menucontent">        
                <hr class="separetor3">        
                <h2>Магазин</h2>                
                <h3>Список товаров на продажу:</h3> 
                <h3>Услуги:</h3>
                <div class="container">
                <?php
                    foreach (GetProcuct(1) as $row){
                ?>
                    <div class="col-md-3 Productborder"> 
                        <div class="row">
                            <h4><?php echo $row['name'] ?></h4> 
                            <h4><?php echo $row['description'] ?></h4> 
                            <h4><?php echo $row['cost'] ?>₽</h4> 
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
                            <h4><?php echo $row['name'] ?></h4> 
                            <h4><?php echo $row['description'] ?></h4> 
                            <h4><?php echo $row['cost'] ?>₽</h4> 
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
                            <h4><?php echo $row['name'] ?></h4> 
                            <h4><?php echo $row['description'] ?></h4> 
                            <h4><?php echo $row['cost'] ?>₽</h4> 
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
                            <h4><?php echo $row['name'] ?></h4> 
                            <h4><?php echo $row['description'] ?></h4> 
                            <h4><?php echo $row['cost'] ?>₽</h4> 
                        </div>
                    </div>
                <?php
                    }
                ?> 
                </div>             
            </div>
        </div>