<div class="container">
  <div class="create-account" id="phrase">
    <?php
      if(isset($a_account_info)){
        print_r($a_account_info);
      }
    ?>
    <h2>Please Enter Account Information.</h2>
    <form action="<?php echo base_url() ?>register" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >        
          
      <input type="text" class = "form-control m-b-5" placeholder="Username" name="txt_username" id = "placeholder-color-w" required><br>
      <input type="password" class = "form-control m-b-5" placeholder="Password" name="txt_password" id = "placeholder-color-w" required><br>
      <input type="password" class = "form-control m-b-5" placeholder="Confirm Password" name="txt_password_conf" id = "placeholder-color-w" required><br>
       <input type="text" class = "form-control m-b-5" placeholder="Approval Code" name="txt_approval_code" id = "placeholder-color-w" required><br>
      <div class = "row btn-create-back">
        <a href = "<?=base_url();?>" class = "">
          <button type="button" class="btn btn-default btn-lg btn-back">
             Back
          </button>
        </a>
        <input class = "btn btn-default btn-lg"type="submit" value="Create">
      </div>
    </form>
  </div>

</div>

 <script src="<?= base_url() . 'application/public/js/jquery-2.1.1.min.js'?>"></script>
    <script>
        $(document).ready(function() {
           $('#phrase').addClass("visibility-hidden").hide("slow",function() {}).delay(100)
                      .queue(function() {
                        $(this).removeClass("visibility-hidden");
                        $(this).fadeIn(300,function() {});
                        $('#myFormId').delay(300).queue(function(){
                                                  $(this).removeClass("visibility-hidden");
                                                  $(this).fadeIn(300,function() {});
                                                  $(this).dequeue();
                                                });
                        $(this).dequeue();
                      });

            var form = $("#myFormId");
            var url = form.attr("action");
            var formData = form.serialize();
            $.post(url, formData, function (data) {
                $("#msg").html(data);
            });
      });
    </script>