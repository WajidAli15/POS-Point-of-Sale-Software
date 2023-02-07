<?php
include('header.php');

?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Supplier Registations</h4>
              <button type="button" id="modal_btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                +Add Supplier
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($table_data as $value) {
                      echo '
                                <tr>
                                      <td>' . $value->id . '</td>
                                      <td>' . $value->name . '</td>
                                      <td>' . $value->address . '</td>
                                      <td>' . $value->phone . '</td>
                                      
                                      <td><button type="button" class="btn btn-success" id="editbtn" data-id="' . $value->id . '">  <i class="fa fa-edit"></i> </button> 
                                      <button type="button" class="btn btn-danger" id="deletebtn" data-id="' . $value->id . '" > <i class="fa fa-trash"></i> </button></td>
                            </tr>
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

<!--  add Modal & Edit Modal-->
<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class= "modal-header" >
        <h5 class="modal-title" id="exampleLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insertform" class="form-material">
          <div class="form-row">
            <div class="form-group col-md-12">

              <!-- Hidden Id -->
              <input type="text" name="id" id="id" value="" hidden>
              <!-- Hidden Id -->

              <div class="form-group col-md-12">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="nme" name="name" placeholder="Enter name" >
              </div>
              <div class="form-group col-md-12">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="adds" name="address" placeholder="Enter address" >
              </div>
              <div class="form-group col-md-12">
                <label for="phone">phone</label>
                <input type="text" class="form-control" id="phn" name="phone" placeholder="Enter phone" required >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="sub" class="btn btn-primary submit">Save</button>
              <!-- hidden button in Add modal -->
            <button type="button" id="update_btn" class="btn btn-success update" >Update</button>
            <!-- hidden button in Add modal -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include('footer.php');
?>

<script>
  ///....insert function ....///
    $('#modal_btn').on('click',function(){
      $('#exampleModal').modal('show');
      $('#update_btn').hide();
      $('#sub').show();
      $('#exampleLabel').text('Supplier Registations');
      $('#insertform').trigger('reset');
    });
    $('#sub').click(function(){
      var nam =$("#nme").val();
      var ad=$("#adds").val();
      var phno=$("#phn").val();
     
      if (nam==""){
        //alert('hey');
        swal({
          icon: 'error',
          title:'error',
          text: 'Please Enter Name',
          timer: 1500,
        });
      }  else if(ad==""){
        //alert('ok');
        swal({
          icon: 'error',
          title:'error',
          text: 'Please Enter Address',
          timer: 1500,
        });
      } else if (phno==""){
        //alert('finle');
        swal({
          icon: 'error',
          title:'error',
          text: 'Please Enter Phone',
          timer: 1500,
        });
      } else {
        var form=$('#insertform').serialize();
        $.ajax({
          type:'post',
          url:'<?=base_url()?>Manage_supplier/insert',
          data: form,
          success: function(result){
            if(result=='correct'){
              swal({
                icon: 'success',
                title: 'successfully',
                text: 'data is saved',
                timer: 1500
              }) .then(() => {
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
        });
      }
    });

        ///...edit ajax...///
    //$(document).on('click','#modal_btn', function()
    //{
    
  $(document).on('click', '#editbtn', function() {
    $('#sub').hide();
    $('#update_btn').show();
    $('#exampleLabel').text('Edit Suppliers');
    $('')
    var id = $(this).data('id');
    $("#exampleModal").modal("show");
    $.ajax({
      type: "post",
      url: '<?=base_url()?>Manage_supplier/getdata',
      data: {
        id: id
      },
      dataType: "json",
      success: function(data) {
        $('#edit_modal').modal('show');
        $("#id").val(data.id);
        $("#nme").val(data.name);
        $("#adds").val(data.address);
        $("#phn").val(data.phone);
      }
    })
  });
  ///..... update function......////
  $('#update_btn').click(function() {
    var form = $('#insertform').serialize();
    $.ajax({
      url: "<?= base_url() ?>Manage_supplier/update",
      type: "post",
      data: form,
      success: function() {
        swal({
          title: "updated!",
          text: "success!",
          icon: "success",
          timer: 1500
        }).then(() => {
          location.reload();
        })
      }
    });
  })

  ///.... Delet ajax.....///
  $(document).on('click', '#deletebtn', function() {
    var id = $(this).data('id');
    alert(id);
    $.ajax({
      type: 'post',
      url: '<?=base_url()?>Manage_supplier/delete',
      data: {
        id: id
      },
      success: function() {
        swal({
          title: "deleted",
          text: "successfully deleted",
          icon: "success",
          timer: 1500
        }).then(() => {
          location.reload();
        })
      }
    })
  })    
</script>