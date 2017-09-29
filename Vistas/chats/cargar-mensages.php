       <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
             include("../../Modelo/chat/chats.php"); 
               ?>

 <?php          
              if(isset($_GET['u']) and isset($_GET['ud'])){
                    $chat=new Chat(); 

                    $result=$chat->listar_chats($_GET['u'],$_GET['ud']);
                    while($row = $result->fetch_array()){ 
                      $img1="../Public/img/Usuarios/".$row['IMG_REMITENTE']."";
                      if($_GET['ud']==$row['US_C_CODIGO']){
                         
                      ?>
                    
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg ">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo $row['REMITENTE'] ?></span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo $img1; ?>" alt="message user image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php echo $row['CHA_D_MENSAGE'] ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <?php } else {
                      ?>

                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?php echo $row['REMITENTE'] ?></span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php echo $img1; ?>" alt="message user image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php echo $row['CHA_D_MENSAGE'] ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                 
                    <?php } ?>

                     <?php } 
                   }
                   else {
echo "no existe".$_GET['ud'];                               # code...
                             }          
      
                    ?>
           
 