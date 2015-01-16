<div class="container row">
 
      <div class="user-pane col-xs-5 row" id="phrase">
        <div class='col-xs-12 pd-no'>
          <div class="btn btn-link btn-top" data-toggle="modal" data-target="#myModal">
            <img src="<?=base_url()?>application/public/img/icons/plus_icon.png" class = "plus-icon img-circle" height="30px" width="30px"/>
             Add User
          </div>
           <hr>
        </div>
        <ul id="nav">
         <?php $this->load->view('admin/get_member_info'); ?>
        </ul>
      </div>
    <?php
    if(isset($a_table_project_data) && $a_table_project_data != NULL){
    ?>

      <div class="intro-project-table pagination col-xs-7" id="phrase"> 
        <table class = "dataTable  table table-content-custom" id="keywords" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Purpose</th>
              <th>Description</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i_count = 0;
              foreach($a_table_project_data as $key => $value){
                echo'
                      <input type="text" class ="visibility-hidden display-none" id="enum_approve_'.$i_count.'"  name="enum_approve_'.$i_count.'" value="Approved"/>
                      <input type="text" class ="visibility-hidden display-none" id="proj_id_'.$i_count.'" value='.$value->Proj_ID.'/>
                      <tr>
                      <td> '.$value->Proj_ID.' </td>
                      <td> '.$value->Proj_Name.' </td>
                      <td> '.$value->Proj_Purpose.' </td>
                      <td> '.$value->Proj_Desc.' </td>
                      <td> '. $value->Proj_status.' </td>
                      <td><button class="btn btn-info btn-sm" onclick="addRowToTable('. $i_count.');">Approve</button>&nbsp<button class="btn btn-success btn-sm">Update</button></td>
                    </tr>';
                  $i_count++;
              }
            ?>
          </tbody>
        </table>
      </div>

  <?php
    }else{
  ?>
      <div class="intro-project" id="phrase">
        <?php if(isset($info)){print_r($info);}?>
            <h2>User has currently no project.</h2>
      </div>
  <?php
    }
  ?> 


   <?php
    if(isset($a_user_data) && $a_user_data != NULL){
    ?>
     <div class="user-info-exist" id="phrase">

      <form id="form_update" name="form_update">

          <div class="form-group row">
            <div class ="col-xs-4">
              <label> Last Name:</label>
              <input id="txt_LName" value = "<?= $a_user_data->Mem_LastName?>" class ="form-control form-names" type="text">
            </div>

            <div class ="col-xs-4">
              <label> First Name:</label>
              <input id="txt_FName" value = "<?= $a_user_data->Mem_FirstName?>" class ="form-control form-names" type="text">
            </div>
            <div class ="col-xs-4">
               <label> Middle Name:</label>
              <input id="txt_MName" value = "<?= $a_user_data->Mem_MiddleName?>" class ="form-control form-names" type="text">
            </div>
          </div>
          <div class="form-group row">
            <div class ="col-xs-6">
              <label>Address:</label>
              <textarea input id="txt_address" value = "<?= $a_user_data->Mem_Address?>" class ="form-control"  type="text"><?= $a_user_data->Mem_Address?></textarea>
            </div>
            <div class ="col-xs-2"></div>
            <div class ="col-xs-4">
              <label>Gender:</label><br>
              <input name="enum_gender" type="radio" value="male"> <cwhite>Male</cwhite>
              <input name="enum_gender" type="radio" value="female"> <cwhite>Female</cwhite>
            </div>
            <br>
          </div>
          <label>Positions:</label>
          <table class="table-custom">
          <tbody>
            <tr>
          <?php
            $i_counter = 0;
            foreach($a_s_positions as $key => $value){
          ?>
                <td>
                  <input name="txt_position" type="radio" value="<?=$value?>"> <cwhite><?=$value?></cwhite>
                </td>

          <?php 
              if($i_counter % 5 == 0 && $i_counter != 0){
                echo '</tr><tr>';
              }
              $i_counter++;
            }
          ?>
           </tr>
            </tbody>
           </table>
            <br>
          <div class="form-group row">
            <div class ="col-xs-4">
              <label>Current Term:</label>
              <input id="txt_curr_term" value = "<?= $a_user_data->Mem_Curr_Term?>"   class ="form-control b-transparent"  type="text">
            </div>
            <div class ="col-xs-2"></div>
          </div>
          <div class="form-group row pull-right">
            <button type="button" id="delete-update" class="btn btn-default btn-transparent-form"><a href="<?=base_url()?>admin/delete_user/<?=$a_user_data->Mem_ID?>">Delete User</a></button>

            <button type="button" id="submit-update" class="btn btn-default btn-transparent-form ">Update User</button>
          </div>
      </form>
    </div>

  <?php
    }else{
  ?>
      <div class="user-info-none" id="phrase">
            <h2>User has currently no Account.</h2>
      </div>
  <?php
    }
  ?>     
</div>
        

<!-- modal body -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New User</h4>
      </div>
      <div class="modal-body">
        <form id="form" name="form">
          <div class="form-group row">
            <div class ="col-xs-4">
              <label> Last Name:</label>
              <input id="txt_LName" placeholder="User's Last Name" class ="form-control form-names" type="text">
            </div>
            <div class ="col-xs-4">
              <label> First Name:</label>
              <input id="txt_FName" placeholder="User's First Name" class ="form-control form-names" type="text">
            </div>
            <div class ="col-xs-4">
               <label> Middle Name:</label>
              <input id="txt_MName" placeholder="User's Middle Name" class ="form-control form-names" type="text">
            </div>
          </div>

          <label>Address:</label>
          <textarea input id="txt_address" placeholder="User's Address" class ="form-control"  type="text"></textarea>

          
          <label>Gender:</label><br>
          <input name="enum_gender" type="radio" value="male"> <cwhite>Male</cwhite>
          <input name="enum_gender" type="radio" value="female"> <cwhite>Female</cwhite>
          <br>
          <label>Positions:</label>
          <table class="table-custom">
          <tbody>
            <tr>
          <?php
            $i_counter = 0;
            foreach($a_s_positions as $key => $value){
          ?>
                <td>
                  <input name="txt_position" type="radio" value="<?=$value?>"> <cwhite><?=$value?></cwhite>
                </td>

          <?php 
              if($i_counter % 5 == 0 && $i_counter != 0){
                echo '</tr><tr>';
              }
              $i_counter++;
            }
          ?>
       
              </tr>
            </tbody>
           </table>
            <br>
           <label>Current Term:</label>
           <input id="txt_curr_term" placeholder="User's Current Term"  class ="form-control"  type="text">
          <label>Approval Code:</label>
           <input id="txt_approval_code" placeholder="User's Approval Code"  class ="form-control"  type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-transparent-form" data-dismiss="modal">Close</button>
        <button type="button" id="submit" class="btn btn-default btn-transparent-form">Add User</button>
       </form>
      </div>
    </div>
  </div>
</div>


 <script type="text/javascript" src="<?= base_url() . 'application/public/js/jquery-2.1.1.min.js'?>"></script>
<script src="<?= base_url() . 'application/public/js/extras/jquery-ui.min.js'?>"></script>
 <script src="<?= base_url() . 'application/public/js/extras/jquery.dataTables.js'?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#submit").click(function() {
      var LName = $("#txt_LName").val();
      var FName = $("#txt_FName").val();
      var MName = $("#txt_MName").val();
      var address = $("#txt_address").val();
      var current_term = $("#txt_curr_term").val();
      var approval_code = $("#txt_approval_code").val();
      var gender = $("input:radio[name=enum_gender]:checked").val();
      var position = $("input:radio[name=txt_position]:checked").val();
      var msg = $("#msg").val();
      if (LName == '' || FName == '' || MName == '' || address == '' || current_term == '' || position == '') {
        alert("Insertion Failed Some Fields are Blank....!!");
      } else {
       // Returns successful data submission message when the entered information is stored in database.
        $.post("/admin/create_user", {
          txt_FName: FName,
          txt_LName: LName,
          txt_MName: MName,
          txt_address: address,
          txt_curr_term: current_term,
          txt_position: position,
          enum_gender: gender,
          txt_approval_code: approval_code,
          msg1: msg
        }, function(data) {
            $('#nav').load('admin/user_refresh');
            $('#form')[0].reset(); // To reset form fields
          });
      }
    });


    $("#submit-update").click(function() {
      var LName = $("#txt_LName").val();
      var FName = $("#txt_FName").val();
      var MName = $("#txt_MName").val();
      var address = $("#txt_address").val();
      var current_term = $("#txt_curr_term").val();
      var approval_code = $("#txt_approval_code").val();
      var gender = $("input:radio[name=enum_gender]:checked").val();
      var position = $("input:radio[name=txt_position]:checked").val();
      var msg = $("#msg").val();
      if (LName == '' || FName == '' || MName == '' || address == '' || current_term == '' || position == '') {
        alert("Insertion Failed Some Fields are Blank....!!");
      } else {
       // Returns successful data submission message when the entered information is stored in database.
        $.post("/admin/update_user", {
          i_member_id: <?php echo $a_user_data->Mem_ID?>,
          txt_FName: FName,
          txt_LName: LName,
          txt_MName: MName,
          txt_address: address,
          txt_curr_term: current_term,
          txt_position: position,
          enum_gender: gender,
          txt_approval_code: approval_code,
          msg1: msg
        }, function(data) {
            alert(data)
            location.reload();
          });
      }
    });


    $('#click-project').addClass("visibility-hidden").hide("slow",function() {});
           $('#please-project').addClass("visibility-hidden").hide("slow",function() {});
           $('#phrase').addClass("visibility-hidden").hide("slow",function() {}).delay(100)
                      .queue(function() {
                        $(this).removeClass("visibility-hidden");
                        $(this).fadeIn(300,function() {});
                        $('#click-project').delay(300).queue(function(){
                                                  $(this).removeClass("visibility-hidden");
                                                  $(this).fadeIn(300,function() {});
                                                  $(this).dequeue();
                                                });
                        $('#please-project').delay(300).queue(function(){
                                                  $(this).removeClass("visibility-hidden");
                                                  $(this).fadeIn(300,function() {});
                                                  $(this).dequeue();
                                                });
                        $(this).dequeue();
                      });
            $('#keywords').dataTable({
              "pageLength": 5,
              "language": {
                 "search": "<span class='glyphicon glyphicon-search span-left'></span>",
                 "sSearchPlaceholder":" Search",
                 "lengthMenu": 'Display <select class ="btn-sm dropdown-data-tables">'+
                   '<option value="3">3</option>'+

                   '</select> records'

               }
            
            });
    
  
});


    function addRowToTable(i)
    {
        var approve  = document.getElementById("enum_approve_"+i).value;
        var project_id = document.getElementById("proj_id_"+i).value;
        if (approve == '' || project_id == '') {
          alert("Failed");
        } else {
         // Returns successful data submission message when the entered information is stored in database.
          $.post("/admin/update_approve", {
           enum_approve: approve,
           proj_id:project_id 
          }, function(data) {
              location.reload();
            });
        }
    }
</script>