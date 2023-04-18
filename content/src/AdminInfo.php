<?php
if (!is_user_logged_in() || !is_user_admin()) {
		redirect_to('/index.php');
	}?>
        <div id="admintable" class="container">
            <div class="container Menucontent">        
                <hr class="separetor3">        
                <h2>Админка</h2>   
                <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Applications')">Обращения</button>
                <button class="tablinks" onclick="openTab(event, 'Orders')">Заказы</button>
                </div>
                <div class="tabcontent" id="Applications">
                    <div class="tab">
                        <button class="tablinks2" onclick="openTab2(event, 'Applications1')">Непрочитанные обращения</button>
                        <button class="tablinks2" onclick="openTab2(event, 'Applications2')">Прочитанные обращения</button>
                    </div> 
                    <div class="tabcontent2" id="Applications1">             
                        <h4>Просмотр непрочитанных обращений.</h4>  
                        <form action="content/src/checkchange.php" method="post">
                            <input class="input2" type="submit" value="Пометить выделенные письма как прочитанные">
                            <div class="container">
                            <?php
                                foreach (find_message(0) as $row2){
                            ?>
                                <div class="col-sm-4 Messageborder"> 
                                    <div class="row">
                                        <h5>ID письма: <?php echo $row2['id']; ?></h5>
                                        <h5>Телефон: <?php echo $row2['telephone']; ?></h5> 
                                        <h5>Имя пользователя: <?php echo $row2['telephoneUser']; ?></h5> 
                                        <h5>Сообщение: <?php echo $row2['telephoneMessage']; ?></h5> 
                                        <h5>Дата сообщения: <?php echo $row2['CurrentDateTelephone']; ?></h5> 
                                        <input type="checkbox" name="check_<?php echo $row2['id'] ?>" value="1">
                                        <label for="check_<?php echo $row2['id'] ?>" >Пометить как прочитанное.</label> 
                                    </div>
                                </div>
                            <?php
                                }
                            ?> 
                            </div>
                        </form >
                    </div>
                    <div class="tabcontent2" id="Applications2">             
                        <h4>Просмотр прочитанных обращений.</h4>  
                        <form action="content/src/checkchange.php" method="post">
                            <input class="input2" type="submit" value="Пометить выделенные письма как непрочитанные">
                            <div class="container">
                            <?php
                                foreach (find_message(1) as $row2){
                            ?>
                                <div class="col-sm-4 Messageborder MessageborderRead"> 
                                    <div class="row">
                                        <h5>ID письма: <?php echo $row2['id']; ?></h5>
                                        <h5>Телефон: <?php echo $row2['telephone']; ?></h5> 
                                        <h5>Имя пользователя: <?php echo $row2['telephoneUser']; ?></h5> 
                                        <h5>Сообщение: <?php echo $row2['telephoneMessage']; ?></h5> 
                                        <h5>Дата сообщения: <?php echo $row2['CurrentDateTelephone']; ?></h5> 
                                        <input type="checkbox" name="check_<?php echo $row2['id'] ?>" value="1">
                                        <label for="check_<?php echo $row2['id'] ?>" >Пометить как непрочитанное.</label> 
                                    </div>
                                </div>
                            <?php
                                }
                            ?> 
                            </div>
                        </form >
                    </div>
                </div>
                <div class="tabcontent" id="Orders">              
                    <div class="tab">
                        <button class="tablinks2" onclick="openTab2(event, 'Orders1')">Необслуженные заказы</button>
                        <button class="tablinks2" onclick="openTab2(event, 'Orders2')">Обслуженные заказы</button>
                    </div> 
                    <div class="tabcontent2" id="Orders1">             
                        <h4>Просмотр необслуженных заказов.</h4>  
                        <form action="content/src/checkchange2.php" method="post">
                            <input class="input2" type="submit" value="Пометить выделенные письма как прочитанные">
                            <div class="container">
                            <?php
                                foreach (FindOrders(0) as $row2){
                            ?>
                                <div class="col-sm-9 Messageborder MessageborderRead"> 
                                    <div class="row">
                                        <h5>ID заказа: <?php echo $row2['id']; ?></h5>
                                        <h5>Логин заказчика: <?php echo find_user_by_id($row2['Username'])['username']; ?></h5> 
                                        <h5>Email заказчика: <?php echo find_user_by_id($row2['Username'])['email']; ?></h5> 
                                        <h5>Дата создания заказа: <?php echo $row2['CurrentDateOrder']; ?></h5> 
                                        <h5>Товары: </h5> 
                                        <?php
                                            foreach (FindItemOrders($row2['id']) as $row){
                                        ?>
                                        <h5><?php echo GetProcuctById($row['products'])['name']; ?> x <?php echo $row['count']; ?> = <?php echo $row['cost']; ?>₽</h5>
                                        <?php
                                            }
                                        ?>
                                        <h5>Итоговая сумма оплаты: <?php echo $row2['FullPrice']; ?></h5>
                                        <input type="checkbox" name="check2_<?php echo $row2['id'] ?>" value="1">
                                        <label for="check2_<?php echo $row2['id'] ?>" >Пометить заказ готовым к выдаче.</label> 
                                    </div>
                                </div>
                            <?php
                                }
                            ?> 
                            </div>
                        </form >
                    </div>
                    <div class="tabcontent2" id="Orders2">             
                        <h4>Просмотр обслуженных заказов.</h4>  
                        <form action="content/src/checkchange2.php" method="post">
                            <input class="input2" type="submit" value="Пометить выделенные письма как непрочитанные">
                            <div class="container">
                            <?php
                                foreach (FindOrders(1) as $row2){
                            ?>
                                <div class="col-sm-9 Messageborder MessageborderRead"> 
                                    <div class="row">
                                        <h5>ID заказа: <?php echo $row2['id']; ?></h5>
                                        <h5>Логин заказчика: <?php echo find_user_by_id($row2['Username'])['username']; ?></h5> 
                                        <h5>Email заказчика: <?php echo find_user_by_id($row2['Username'])['email']; ?></h5> 
                                        <h5>Дата создания заказа: <?php echo $row2['CurrentDateOrder']; ?></h5> 
                                        <h5>Товары: </h5> 
                                        <?php
                                            foreach (FindItemOrders($row2['id']) as $row){
                                        ?>
                                        <h5><?php echo GetProcuctById($row['products'])['name']; ?> x <?php echo $row['count']; ?> = <?php echo $row['cost']; ?>₽</h5>
                                        <?php
                                            }
                                        ?>
                                        <h5>Итоговая сумма оплаты: <?php echo $row2['FullPrice']; ?>₽</h5>
                                        <input type="checkbox" name="check2_<?php echo $row2['id'] ?>" value="1">
                                        <label for="check2_<?php echo $row2['id'] ?>" >Пометить заказ неготовым к выдаче.</label> 
                                    </div>
                                </div>
                            <?php
                                }
                            ?> 
                            </div>
                        </form >
                    </div>
                </div>               
            </div>
        </div>