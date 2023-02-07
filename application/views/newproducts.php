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
              <h4>New Products</h4>
              <!-- Button trigger modal -->
              <button type="button" id="modal_btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                +Add New Product 
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="mainTable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Catagory</th>
                      <th>Products</th>
                      <th>Price</th>
                      <th>Image</th>
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
                            <td>' . $value->product . '</td>
                            <td>' . $value->price . '</td>
                            <td><img src="' . base_url() . 'assets/product/' . $value->img . '"  style="width:20%;height:80px"></td>
                            <td>
                            <button type="button" id="editbtn" data-id="' . $value->id . '" class="btn btn-info" > <i class="fa fa-edit"></i> 
                            </button>
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
</div>
</div>
<!-- add new Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="submit_form">
          <div class="form-group row">
            <div class="col-sm-12">
              <label for="catagory">catagory</label>
              <select class="form-control" name="catagory" id="catagory">
                <?php
                foreach ($table_data2 as $value) {
                  echo '
          <option value="' . $value->catagory . '">' . $value->catagory . '</option>
        ';
                } ?>
              </select>
            </div>
            <label for="product" class="col-sm-4 col-form-label">Product Name:</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="pname" name="pname" required>
            </div>
            <label for="price" class="col-sm-4 col-form-label">Price:</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <!--- product image----->
            <div class="control-group form-group">
              <div class="controls">
                <br>
                <label>Upload Photo:</label>
                <input name="file" type="file" id="image_file" required>
                <p class="help-block"></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="sub" class="btn btn-primary submit">Save</button>
            <!-- hidden button in Add modal -->
            <button type="submit" id="update_btn" class="btn btn-success update">Update</button>
            <!-- hidden button in Add modal -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- footer llink --->
<?php
include('footer.php');
?>

<!-- editable-table.html  21 Nov 2019 03:56:04 GMT -->

</html>

<script>
  ///.......insert image on data base only.....////
  $(document).on('click', '#modal_btn', function() {
    $('#sub').show();
    $('#update_btn').hide();
    $('#submit_form').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: '<?= base_url() ?>Newproducts/insert',
        type: "post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
          alert(data);
          if (data === "true") {
            swal({
              title: "updated!",
              text: "Product saved!",
              icon: "success",
              timer: 1800
            }).then(() => {
              location.reload();
            })
          } else {
            echo('data is false')
          }
        }
      });
    });
  });
  //insert ajax without image
  /*
    $(document).ready(function(){
  $('#self_form').submit(function()
  {
    var form_data = $(this).serialize();
    event.preventDefault();
    $.ajax({
      type:'POST',
      url:'//</?=base_url()?>Newproducts/insert',
      data: form_data,

      success:function(data)
      {
        if(data!="Corect")
        {
              alert('data is accurate');
          location.reload();
        }
        else
        {
          alert('data is false');
        }
      }
    });
    });
  });*/

  //edit ajax
  $(document).on('click', '#editbtn', function() {
    $('#sub').hide();
    $('#update_btn').show();
    var id = $(this).data('id');
    $("#exampleModal").modal("show");
    $.ajax({
      url: '<?= base_url() ?>Newproducts/getdata',
      type: "post",
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      dataType: "json",
      success: function(data) {
        $('#edit_modal').modal('show');
        $("#id").val(data.id);
        $("#catagory").val(data.catagory);
        $("#product").val(data.product);
        $("#price").val(data.price);
        $("#img").val(data.img);
      }
    })
  });
  //update ajax
  $('#btn_update').click(function() {
    var form = $('#submit_form').serialize();
    $.ajax({ // added {
      url: "<?= base_url() ?>Newproducts/update",
      type: "post",
      data: form,
      success: function() {
        swal({
          title: "Updated!",
          text: "Success!",
          icon: "success",
          timer: 1800
        }).then(() => {
          location.reload();
        })
      }
    }); // added }
  })
  // delete ajax
  $(document).on('click', '#deletebtn', function() {
    var id = $(this).data('id');
    alert(id);

    $.ajax({
      type: 'post',
      url: '<?= base_url() ?>Newproducts/delete',
      data: {
        id: id
      },
      success: function() {
        swal({
          title: "deleted",
          text: "successfully deleted",
          icon: "success",
          time: 1800
        }).then(() => {
          location.reload();
        })
      }
    })
  })
</script>