<section class="content-header">
   <section class="content">
     <div class="box box-info custom_box">
       <div class="box-header">
         <h3 class="box-title"><i class="fa fa-edit"></i> <?php echo $this->lang->line("edit")." - ".$this->lang->line("package settings"); ?></h3>
       </div><!-- /.box-header -->
       <!-- form start -->
       <form class="form-horizontal" action="<?php echo site_url().'payment/update_package_action';?>" method="POST">
         <div class="box-body">
           <div class="form-group">
             <label class="col-sm-3 control-label" for="name"> <?php echo $this->lang->line("package name")?> *</label>
             <div class="col-sm-9 col-md-6 col-lg-6">
               <input name="name" value="<?php echo $value[0]["package_name"];?>"  class="form-control" type="text">
               <span class="red"><?php echo form_error('name'); ?></span>
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-3 control-label" for="price"><?php echo $this->lang->line("price")?> - <?php echo $payment_config[0]['currency']; ?> *</label>
             <div class="col-sm-9 col-md-6 col-lg-6">
               <?php 
               if($value[0]['is_default']=="1") 
               { ?>
           		  <select name="price" id="price_default" class="form-control">
                     <option  value="Trial" <?php if( $value[0]["price"]=="Trial") echo 'selected="yes"'; ?>>Trial</option>
                     <option  value="0" <?php if( $value[0]["price"]=="0") echo 'selected="yes"'; ?>>Free</option>
                  </select>
           	   <?php
               }
               else
               { ?>
               	   <input name="price" value="<?php echo $value[0]["price"];?>"  class="form-control" type="text">
               <?php
               }
               ?>
               <span class="red"><?php echo form_error('price'); ?></span>
             </div>
           </div>
           <div class="form-group" id="hidden">
             <label class="col-sm-3 control-label" for="price"><?php echo $this->lang->line("validity");?> - <?php echo $this->lang->line("days"); ?> *</label>
             <div class="col-sm-9 col-md-6 col-lg-6">
               <input id="validity" name="validity" value="<?php echo $value[0]["validity"];?>"  class="form-control" type="text">

               <span class="red"><?php echo form_error('validity'); ?></span>
             </div>
           </div>


          <div class="form-group">
             <label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("modules")?> * </label>
             <div class="col-sm-9">

            <div class="table-responsive">
             <table class="table table-bordered table-hover table-striped" style="width:auto;">
              <tr>
               <td colspan="5"><input  id="all_modules" type="checkbox"/> <font color="blue">&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $this->lang->line("All Modules"); ?></b></font> [<?php echo $this->lang->line("0 means unlimited");?>]</td>
              </tr>
               <?php                   

                    $current_modules=array();
                    $current_modules=explode(',',$value[0]["module_ids"]); 
                    $monthly_limit=json_decode($value[0]["monthly_limit"],true);
                    $bulk_limit=json_decode($value[0]["bulk_limit"],true);

                    echo "<tr>";    
                        echo "<th class='text-center info'>"; 
                          echo $this->lang->line("sl");         
                        echo "</th>"; 
                        echo "<th class='info'>"; 
                          echo $this->lang->line("modules");         
                        echo "</th>";
                        echo "<th class='text-center info' colspan='2'>"; 
                          echo $this->lang->line("Limit");         
                        echo "</th>";
                        echo "<th class='text-center info' colspan='2'>"; 
                          echo $this->lang->line("Bulk Limit");         
                        echo "</th>";
                    echo "</tr>";

                    $no_limit_modules=array();
                    $not_monthly_modules=array();
                    foreach($modules as $module) 
                    {
                      if($module['limit_enabled']=='0')
                      $no_limit_modules[]=$module['id'];

                      if($module['extra_text']=='')
                      $not_monthly_modules[]=$module['id'];
                    }
                    $SL=0;
                    foreach($modules as $module) 
                    {  
                     $SL++;
                     echo "<tr>";  
                        echo "<td class='text-center'>".$SL."</td>";    
                        echo "<td>";
                          if(is_array($current_modules) && in_array($module['id'], $current_modules))
                          { ?>                  
                               <input  name="modules[]" id="box<?php echo $SL;?>" class="modules" checked="checked" type="checkbox" value="<?php echo $module['id']; ?>"/>
                          <?php 
                          }
                          else
                          { ?>
                              <input  name="modules[]" id="box<?php echo $SL;?>" class="modules"  type="checkbox" value="<?php echo $module['id']; ?>"/>
                           <?php 
                          }
                          echo "&nbsp;&nbsp;&nbsp;&nbsp;<label for='box".$SL."' style='cursor:pointer;'>".$module['module_name']."</label>";                 
                      echo "</td>";

                      $xmonthly_val=0;
                      $xbulk_val=0;
                     
                      if(in_array($module["id"],$current_modules))
                      {
                        $xmonthly_val=$monthly_limit[$module["id"]];
                        $xbulk_val=$bulk_limit[$module["id"]];
                      }

                      if(in_array($module["id"],$no_limit_modules))
                      {
                        $type="hidden";
                        $limit="";

                      }
                      else
                      {
                          $type="number";
                          if(in_array($module["id"],$not_monthly_modules)) $limit="";
                          else $limit='/ '.$this->lang->line($module['extra_text']);
                     }

                      echo "<td style='padding-left:10px'>".$limit."</td><td><input type='".$type."' value='".$xmonthly_val."' min='0' style='width:70px;' name='monthly_".$module['id']."'></td>";
                      
                      if(!in_array($module["id"],array(110,111,112,113,114)))
                      {
                          $type="hidden";
                          $limit="";
                      }
                      else
                      {
                          $type="number";
                          $limit="";
                      }

                      if($xbulk_val==0)
                      {
                        if($module["id"]==110) $xval=5;
                        else if($module["id"]==111) $xval=10;
                        else if($module["id"]==112) $xval=5;
                        else if($module["id"]==113) $xval=10;
                        else if($module["id"]==114) $xval=10;
                        else $xval=0;

                        $xbulk_val=$xval;
                      }

                      echo "<td class='text-center'><input type='".$type."' min='0' value='".$xbulk_val."' style='width:70px;' name='bulk_".$module['id']."'></td>";
                      echo "</tr>";                 
                   }                
                ?>            
              </table>  
              </div>   
               <span class="red" ><?php echo "<br/><br/>".form_error('modules[]'); ?></span>  
              </div> 
           </div>
           

          
           <input name="id" value="<?php echo $value[0]["id"];?>"  class="form-control" type="hidden">              
           <input name="is_default" value="<?php echo $value[0]["is_default"];?>"  class="form-control" type="hidden">              

           </div> <!-- /.box-body --> 
           <div class="box-footer">
               <button name="submit" type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> <?php echo $this->lang->line("Save");?></button>
               <button  type="button" class="btn btn-default btn-lg" onclick='goBack("payment/package_settings",0)'><i class="fa fa-remove"></i> <?php echo $this->lang->line("Cancel");?></button>
            </div><!-- /.box-footer -->         
         </div><!-- /.box-info -->       
       </form>     
     </div>
   </section>
</section>


<script type="text/javascript">
  $j(document).ready(function() {
  	if($("#price_default").val()=="0") $("#hidden").hide();
    else $("#validity").show();
    $("#all_modules").change(function(){
      if ($(this).is(':checked')) 
      $(".modules").prop("checked",true);
      else
      $(".modules").prop("checked",false);
    });
    $("#price_default").change(function(){
    	if($(this).val()=="0") $("#hidden").hide();
    	else $("#hidden").show();
    });
  });
</script>

<style type="text/css" media="screen">
  td,th{background:#fff}
</style>