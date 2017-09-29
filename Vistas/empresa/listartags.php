              <?php  
              require('../../config.ini.php');
              include("../../Modelo/conexion.php");
             include("../../Modelo/empresas/tagsempresa.php"); 
              include("../../Modelo/empresas/tags.php"); ?>
<?php  if(isset($_GET['e']) and isset($_GET['u']) and isset($_GET['t'])){
                $idemp=$_GET['e'];
                $idus=$_GET['u'];
                $tag=$_GET['t'];
                $te=new TagsEmpresa();
               $tags=$te->save_tagsempresa($idemp,$idus,$tag) ; 
             echo '<span class="badge bg-green">'.$tags[0].'</span>';
           }else if (isset($_GET['tg'])) {
             $idus=$_GET['u'];
              $tg=$_GET['tg'];
               $te=new TagsEmpresa();
               $tags=$te->delete_tagsempresa($tg,$idus) ; 
             echo '<span class="badge bg-red">'.$tags[0].'</span>';
           }else{
            ?>
              
                <table >
                           <?php if ($_GET['txt']!=""){
                                    $idemp=$_GET['e'];
                                    $txt=$_GET['txt'];
                                    $us=$_GET['u'];
                                    $tag=new Tags();
                                    $t=$tag->get_allttxt($txt);
                                         while($cat=$t->fetch_array()){
                                     ?>
                                     <tr><td>
                                     <a onclick="link(<?php echo $idemp; ?>,<?php echo $us; ?>,<?php echo $cat['TAG_C_CODIGO']; ?>)" href="#tag" ><?php echo $cat['TAG_D_NOMBRE'] ?></a>
                                     </td></tr>
                                     <?php } 
                                     }
                                     }?>
                
                    </table>  
                <div class="form-group">
                    <?php 
                    $idemp=$_GET['e'];
                    $us=$_GET['u'];
                    $idemp=$_GET['e'];
                   $e=new TagsEmpresa();
                   $ta=$e->get_alltagsempresa($idemp);
                   while($cat=$ta->fetch_array()){
                     ?>
             
                      <button type="button" class="btn btn-info col-md-4 "  ><?php echo $cat['TAG_D_NOMBRE'] ?> &nbsp;&nbsp;&nbsp;<i   onclick="eliminar(<?php echo $cat['TGE_C_CODIGO']?>,<?php echo $us; ?>,<?php echo $idemp; ?>)" class="fa fa-close"></i></button>

              <?php } ?>
               </div>