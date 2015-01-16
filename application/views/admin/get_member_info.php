 <?php
           foreach($a_o_member_list as $o_member_info){
 ?>
            <li class = "row-sidebar"><a class="btn btn-transparent btn-li" href="<?=base_url()?>admin/view_user_info/<?=$o_member_info->Mem_ID?>"><h2><?=$o_member_info->Mem_FirstName?></h2></a></li> 
          <?php
            }
 ?>