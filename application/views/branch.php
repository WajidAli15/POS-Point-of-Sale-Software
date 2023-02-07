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
              <h4>Branch</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                +Add Branch
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>date</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($table_data as $value) {
                      echo '
                                <tr>
                                      <td>' . $value->id . '</td>
                                      <td>' . $value->date . '</td>
                                      <td>' . $value->name . '</td>
                                      <td>' . $value->address . '</td>
                                      <td>' . $value->city . '</td>
                                      <td>' . $value->phone . '</td>
                                      <td>' . $value->status . '</td>

                                      <td><button type="button" class="btn btn-success" id="editbtn" data-id="' . $value->id . '">
                            edit
                          </button> </td>
                          <td><button type="button" class="btn btn-danger" id="deletebtn" data-id="' . $value->id . '" >Delete</button></td>
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

</div>
</div>





<!--  add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insertform" class="form-material">
          <div class="form-row">
            <div class="form-group col-md-6">

              <!-- Hidden Id -->
              <input type="text" name="id" id="id" value="" hidden>
              <!-- Hidden Id -->

              <label for="date">Date</label>
              <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
            </div>
            <div class="form-group col-md-6">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required>
            </div>
            <div class="form-group col-md-6">
              <label for="phone">phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" required>
            </div>
            <div class="form-group col-md-6">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status" required>
                <option value="enable"> Enable </option>
                <option value="disable"> Disable </option>
              </select>

            </div>
          </div>
          <br>
          <div class="modal-footer">
            <button type="submit" id="sub" class="btn btn-primary submit">Save</button>
            <button type="button" id="update_btn" class="btn btn-success update" hidden>Update</button>
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
  $(document).ready(function() {
    $('#insertform').submit(function() {
      var form_data = $(this).serialize();
      event.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?= base_url() ?>Branch/insert',
        data: form_data,
        success: function(data) {
          if (data != 'Corect') {
            alert('data is accurate');
            location.reload();
          } else {
            alert('data is false');
          }
        }

      });
    });
  });

  ///...edit ajax...///

  $(document).on('click', '#editbtn', function() {
    var id = $(this).data('id');
    $(".submit").attr("hidden", true);
    $('.update').removeAttr('hidden');
    $("#exampleModal").modal("show");
    $.ajax({
      type: "post",
      url: '<?= base_url() ?>Branch/getdata',
      data: {
        id: id
      },
      dataType: "json",
      success: function(data) {
        $('#edit_modal').modal('show');
        $("#id").val(data.id);
        $("#date").val(data.date);
        $("#name").val(data.name);
        $("#address").val(data.address);
        $("#city").val(data.city);
        $("#phone").val(data.phone);
        $("#status").val(data.status);
      }
    })
  });
  ///..... update function......////
  $('#update_btn').click(function() {
    var form = $('#insertform').serialize();
    $.ajax({
      url: "<?= base_url() ?>Branch/update",
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
      url: '<?= base_url() ?>Branch/delete',
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