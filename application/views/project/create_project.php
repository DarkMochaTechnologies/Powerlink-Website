<div class="container">
  <div class="create-project" id="phrase">
    <h2>Please Enter Project Information.</h2>
    <form action="<?php echo base_url() ?>bms/create" method="post"  enctype="multipart/form-data" class="form-horizontal" role="form" id = 'myFormId' >        
          
      <input type="text" class = "form-control m-b-5" placeholder="Name" name="txt_project_name" id = "placeholder-color-w" required><br>
      <input type="text" class = "form-control m-b-5" placeholder="Purpose" name="txt_project_purpose" id = "placeholder-color-w" required><br>
      <textarea class = "form-control m-b-5" placeholder="Description" name="txt_project_description" id = "placeholder-color-w" required></textarea> <br>
      <div class="form-group m-ddn row m-b-5">
        <div class = "col-xs-6 ">
          <select name="ddn_category" class="dropdown btn btn-default opacity-6" tabindex="2">
            <option value="" disabled selected>Select a Category</option>
            <?php 
              if(isset($a_cat_list)){
                foreach($a_cat_list as $key => $value){
                  echo '<option value="'.$value->Cat_ID.'">'.$value->Cat_Type.'</option>';
                    }
                  }
                ?>
          </select>
        </div>
      </div>
      <div class = "row btn-create-back">
        <a href = "<?=base_url();?>bms" class = "">
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