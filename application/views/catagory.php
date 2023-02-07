<?php
include('header.php');
?>
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card ">
            <div class="card-header ">
              <h4>Insert Catagory</h4>
              <!-- Button trigger modal -->
              <button type="button" id="modal_btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                +ADD NEW
              </button>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="mainTable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Catagory</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($table_data as $value) {
                      echo '
                                <tr>
                                <td>' . $value->id . '</td>
                                <td>' . $value->catagory . '</td>
                                <td>
                                <button type="button" id="editbtn" data-id="' . $value->id . '" data-catagory="' . $value->catagory . '" class="btn btn-info" >  <i class="fa fa-edit"></i> </button>
                                <button type="button" class="btn btn-danger" id="deletebtn" data-id="' . $value->id . '"> <i class="fa fa-trash"></i> </button></td>
                                </tr>
                                ';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- add new Modal -->
<div class="modal fade" id="exmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label_heading"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insert_form">
          <div class="form-group row">

            <input type="text" id="id" name="id" hidden>

            <label for="catagory" class="col-sm-5 col-form-label">Catagory Name:</label>
            <div class="col-sm-12">
              <input type="text" class="form-control-plaintext" id="catagory" name="catagory" placeholder="Enter New Catagory">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="save_btn" class="btn btn-primary submit"><i class="fa fa-save"> Save</i></button>
            <!-- Hidden update button on add modal --->
            <button type="button" id="update_btn" class="btn btn-info update"> Update</button>
            <!-- Hidden update button on add modal --->
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- footer llink --->
<?php
include('footer.php');
?>
<script>
  ////----insert function ------>
  // function any(){
  //var form=$("#insert_form");
  $('#modal_btn').on('click', function() {
    $('#exmodal').modal('show');
    $("#update_btn").hide();
    $("#save_btn").show();
    $("#label_heading").text("Add New Catagory");
    $("#insert_form").trigger("reset");
  });
  $('#save_btn').on('click', function() {
    var form = $('#insert_form').serialize();
    var catagory = $('#catagory').val();
    event.preventDefault();
    if (catagory == "") {
      swal({
        icon: 'error',
        title: "Enter Catagory",
        text: 'Please insert catagory',
        timer: 1500
      })
    } else {
      $.ajax({
        type: 'post',
        url: '<?= base_url() ?>Catagory/insert',
        data: form,
        success: function(data) {
          if (data == "corect") {

            swal({
                icon: "success",
                title: "Saved",
                timer: 1500

              })
              .then(() => {
                location.reload();
              })
          } else {
            swal({
              icon: 'error',
              title: "Try Again",
              timer: 1500
            })
          }
        }
      })
    }
  });
  //--- Edit modal ------>
  $(document).on('click', '#editbtn', function() {
    $('#exmodal').modal('show');
    $('#label_heading').text('Edit Catagory');
    $('#save_btn').hide();
    $("#update_btn").show();
    var id = $(this).data("id");
    var catagory = $(this).data("catagory");

    $("#id").val(id);
    $("#catagory").val(catagory);
    $('#update_btn').on('click', function() {
      var catagory = $("#catagory").val();
      if (catagory == "") {
        swal({
          icon: 'error',
          title: "Enter Catagory",
          timer: 1500
        })
      } else {
        var form = $('#insert_form').serialize();
        $.ajax({
          type: 'post',
          url: '<?= base_url() ?>Catagory/update',
          data: form,
          success: function(data) {
            if (data == "corect") {

              swal({
                  icon: "success",
                  title: "Saved",
                  timer: 1500

                })
                .then(() => {
                  location.reload();
                })
            } else {
              swal({
                icon: 'success',
                title: "Updated",
                text: "Catagory is Updated",
                timer: 1500
              }).then(() => {
                location.reload();
              })
            }
          }
        })
      }
    });
  })
  //----- Delet ajax----->
  $(document).on('click','#deletebtn', function(){
    var id=$(this).data('id');
    alert (id);
    $.ajax({
      type:"post",
      url:"<?=base_url()?>catagory/delete",
      data: {id:id},
      success: function(){
        swall({
          icon: 'success',
          title: 'deleted',
          text: 'Catagory Deleted',
          timer: 1500,
        }).then(()=>{
          location.reload();
        })
      }
    })
  })
</script>