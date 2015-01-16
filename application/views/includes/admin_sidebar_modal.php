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


 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="application/public/js/extras/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="application/public/js/extras/jquery.localscroll-1.2.7-min.js"></script>
<script type="text/javascript" src="application/public/js/extras/jquery.scrollTo-1.4.2-min.js"></script>
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
            $alert(function(){
              $('#nav_member').load('admin/user_refresh');
            });
            $('#form')[0].reset(); // To reset form fields
          });
      }
    });

  
});
</script>