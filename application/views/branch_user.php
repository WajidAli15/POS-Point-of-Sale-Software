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
                            <h4>Branch User</h4>
                            <button type="button" id="modal_btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                +Add Branch User
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($table_data1 as $value) {
                                            echo '
                                <tr>
                                      <td>' . $value->id . '</td>
                                      <td>' . $value->date . '</td>
                                      <td>' . $value->name . '</td>
                                      <td>' . $value->email . '</td>
                                      <td>' . $value->buser . '</td>
                                     
                                      <td><button type="button" class="btn btn-info" id="editbtn" data-id="' . $value->id . '"> <i class="fa fa-edit"></i> </button> 
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
<!--  add Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lablheading"></h5>
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
                            <input type="date" class="form-control" id="date" name="date" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="buser">Branch User</label>
                            <select type="buser" style="width:100%" class="form-control select2" id="buser" name="buser" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" id="sub" class="btn btn-primary submit"><i class="fa fa-save"> Save</i></button>
                        <button type="button" id="update_btn" class="btn btn-success update">Update</button>
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
    $(document).on('click', '#modal_btn', function() {
        $("#sub").show();
        $('#update_btn').hide();
        $('#lablheading').text('Add Branch User');
    });
    $(document).ready(function() {
        $('#sub').click(function() {
            var dte=$('#date').val();
            var nme=$('#name').val();
            var mail=$('#email').val();
            var user=$('#buser').val();
            if (dte==""){
               // alert('okkk')
                swal({
          icon: 'error',
          title:'error',
          text: 'Please Enter Date',
          timer: 1500,
        });
            } else if (nme==""){
                swal({
          icon: 'error',
          title:'error',
          text: 'Please Enter Name',
          timer: 1500,
        });
            } else if(mail==""){
                swal({
          icon: 'error',
          title:'error',
          text: 'Please Enter Email',
          timer: 1500,
        });
            } else if (user==""){
                swal({
          icon: 'error',
          title:'error',
          text: 'Please Enter Branch user Type',
          timer: 1500,
        });
            } else {
                var form_data=$('#insertform').serialize();
            $.ajax({
                type: 'post',
                url: '<?= base_url() ?>Branch_user/insert',
                data: form_data,
                success: function(data) {
                    if (data != 'Corect') {
                        swal({
                            title: "Saved",
                            text: "successfully Save",
                            icon: "success",
                            timer: 1800
                        }).then(() => {
                            location.reload();
                        })
                    } else {
                        alert('data is false');
                    }
                }

            });
        };
    });

    ///...edit ajax...///

    $(document).on('click', '#editbtn', function() {
        $('#sub').hide();
        $('#update_btn').show();
        $('#lablheading').text('Edit Branch User');
        var id = $(this).data('id');
        $("#exampleModal").modal("show");
        $.ajax({
            type: "post",
            url: '<?= base_url() ?>Branch_user/getdata',
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#edit_modal').modal('show');
                $("#id").val(data.id);
                $("#date").val(data.date);
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#buser").val(data.buser);
            }
        })
    });
    ///..... update function......////
    $('#update_btn').click(function() {
        var form = $('#insertform').serialize();
        $.ajax({
            url: "<?= base_url() ?>Branch_user/update",
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
            url: '<?= base_url() ?>Branch_user/delete',
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
});
</script>