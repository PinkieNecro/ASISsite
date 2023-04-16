        <div id="shop" class="container">
            <div class="container Menucontent">        
                <hr class="separetor3">        
                <h2>Магазин</h2>                
                <h3>Список товаров на продажу:</h3> 
                <h3>Услуги:</h3>
                <?php
                    GetProcuct(1);
                ?> 
                <table>
                    <tr>
                        <td><?php echo $row['name'] ?></td> 
                        <td><?php echo $row['description'] ?></td> 
                        <td><?php echo $row['price'] ?></td> 
                    </tr>
                </table>
                <h3>Сканеры штрихкодов:</h3> 
                <?php
                    GetProcuct(2);
                ?> 
                <table>
                    <tr>
                        <td><?php echo $row['name'] ?></td> 
                        <td><?php echo $row['description'] ?></td> 
                        <td><?php echo $row['price'] ?></td> 
                    </tr>
                </table>
                <h3>Принтеры:</h3>
                <?php
                    GetProcuct(3);
                ?>      
                <table>
                    <tr>
                        <td><?php echo $row['name'] ?></td> 
                        <td><?php echo $row['description'] ?></td> 
                        <td><?php echo $row['price'] ?></td> 
                    </tr>
                </table>     
                <h3>Фискальные накопители:</h3>
                <?php
                    GetProcuct(4);
                ?>
                <table>
                    <tr>
                        <td><?php echo $row['name'] ?></td> 
                        <td><?php echo $row['description'] ?></td> 
                        <td><?php echo $row['price'] ?></td> 
                    </tr>
                </table>             
            </div>
        </div>