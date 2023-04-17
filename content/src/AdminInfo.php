<?php
if (!is_user_logged_in() || !is_user_admin()) {
		redirect_to('/index.php');
	}?>
        <div id="admintable" class="container">
            <div class="container Menucontent">        
                <hr class="separetor3">        
                <h2>Админка</h2>                
                <h4>Просмотр обращений.</h4> 
                <form action="" method="get">
                    <input id="admintext" type="checkbox" name="check2" value="1">
                    <label for="check2" >Отображать только прочитанные письма.</label> 
                    <input class="input2" type="submit" value="Обновить">
                </form >   
                <form action="content/src/checkchange.php" method="post">
                    <?php if (!isset($_GET['check2'])){$_GET['check2']=0;} 
                        if($_GET['check2']==1){?>
                            <input class="input2" type="submit" value="Пометить выделенные письма как непрочитанные">
                        <?php } else{?>
                            <input class="input2" type="submit" value="Пометить выделенные письма как прочитанные">
                        <?php }?>
                    <div class="container">
                    <?php
                        if (!isset($_GET['check2'])){$_GET['check2']=0;}
                        $id = $_GET['check2'];
                        foreach (find_message($id) as $row2){
                    ?>
                        <?php if($row2['checked']==1){?>
                            <div class="col-sm-5 Messageborder MessageborderRead"> 
                        <?php } else{?>
                            <div class="col-sm-5 Messageborder"> 
                        <?php }?>
                            <div class="row">
                                <h5>ID письма: <?php echo $row2['id']; ?></h5>
                                <h5>Телефон: <?php echo $row2['telephone']; ?></h5> 
                                <h5>Имя пользователя: <?php echo $row2['telephoneUser']; ?></h5> 
                                <h5>Сообщение: <?php echo $row2['telephoneMessage']; ?></h5> 
                                <h5>Дата сообщения: <?php echo $row2['CurrentDateTelephone']; ?></h5> 
                                <?php if($row2['checked']==1){?>
                                    <input type="checkbox" name="check_<?php echo $row2['id'] ?>" value="1">
                                    <label for="check_<?php echo $row2['id'] ?>" >Пометить как непрочитанное.</label> 
                                <?php } else{?>
                                    <input type="checkbox" name="check_<?php echo $row2['id'] ?>" value="1">
                                    <label for="check_<?php echo $row2['id'] ?>" >Пометить как прочитанное.</label> 
                                <?php }?>
                            </div>
                        </div>
                    <?php
                        }
                    ?> 
                    </div>
                </form >               
            </div>
        </div>