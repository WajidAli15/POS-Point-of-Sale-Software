<?php
include('header.php');
?>
<div class="main-content">
  <section>
    <div class="card">
      <div class="card-header">
        <h4>Expences</h4>
        <!-- Button trigger modal -->
        <button type="button" onclick="myfunctionl()" id="modal_btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          +Add Expences
        </button>


      </div>
      <div class="card-body">
        <div class="section-title mt-0"></div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Date</th>
              <th scope="col">Details</th>
              <th scope="col">Amount</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>

            <?php

            foreach ($table_data as $value) {

              echo '
                      <tr>
                      <td>' . $value->id . '</td>
                      <td>' . $value->date . '</td>
                      <td>' . $value->detail . '</td>
                      <td>' . $value->amount . '</td>
                      <td><button type="button" class="btn btn-info" id="editbtn" data-id="' . $value->id . '" data-details="' . $value->detail . '" data-amount="' . $value->amount . '" data-date="' . $value->date . '"> <i class="fa fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-danger" id="deletebtn" data-id="' . $value->id . '">  <i class="fa fa-trash"></i> </button> </td>
                      </tr>
                      ';
            }

            ?>

          </tbody>
        </table>
      </div>
  </section>
</div>

<!-- Add new Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lbl_heading">Add Expence</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="forminsert" class="form-material">
          <div class="form-row">
            <!-- Hidden Id -->
            <input type="text" name="id" id="id" value="" hidden>
            <!-- Hidden Id -->
            <div class="col-md-12 mb-3">
              <label for="date">Date</label>
              <input type="date" class="form-control" id="dt" name="date">
            </div>
            <div class="col-md-12 mb-3">
              <label for="detail">detail</label>
              <input type="text" class="form-control" id="detail" name="detail" placeholder="Enter detail">
            </div>
            <div class="col-md-12 mb-3">
              <label for="amount">amount</label>
              <input type="text" class="form-control" id="amount" name="amount" placeholder="amount">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="save_btn" class="btn btn-primary submit">Save</button>
        <button type="button" id="update_btn" class="btn btn-success update">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
include('footer.php');
?>

<script>

  function myfunctionl()
  {
    $("#lbl_heading").text("Add New Expense");
    $("#save_btn").show();
    $("#update_btn").hide();
    $("#forminsert").trigger("reset");
  }
  $("#save_btn").click(function() {
    var date = $("#dt").val();
    var detail = $("#detail").val();
    var amount = $("#amount").val();

    if (date == "") {

      //alert("Please Enter Date");
      swal({
        title: "error!",
        text: "Please insert Date!",
        icon: "error",
        timer: 1500
      })
    } else if (detail == "") {
      //alert("Please Enter Details");
      swal({
        title: "error!",
        text: "Please insert detail!",
        icon: "error",
        timer: 1500
      })
    } else if (amount == "") {
      // alert("Please Enter Amount");
      swal({
        title: "error!",
        text: "Please insert amount!",
        icon: "error",
        timer: 1500
      })
    } else {
      
      // insert ajax shortly way //
        var form_data=$("#forminsert").serialize();
        $.ajax({
          type:'post',
          url:'<?= base_url() ?>Expences/insert',
          data:form_data,
          success:(function(result){
              if(result=="true")
              {
                //alert("Saved");
                swal({
            title: "saved!",
            text: "successfully saved!",
            icon: "success",
            timer: 1800
          }).then(() => {
            location.reload();
          })
              }
              else if(result=="false"){
                alert("Something Wrong!!");
              }
          }),
          error:(function(){

          })
        });
  
      // insert ajax shortly way //

    }
  });   

  //--- edit function -----//
  $(document).on('click' , '#editbtn', function(){
    var id=$(this).data("id");
    var date=$(this).data("date");
    var details=$(this).data("details");
    var amount=$(this).data("amount");

    $("#save_btn").hide();
    $("#update_btn").show();
    $("#exampleModal").modal("show");
    $("#lbl_heading").text("Edit Expense");
    
    $("#id").val(id);
    $("#dt").val(date);
    $("#detail").val(details);
    $("#amount").val(amount);
  });
  //--- edit function -----//

  //---- update function-----//
  $("#update_btn").click(function() {
    var date = $("#dt").val();
    var detail = $("#detail").val();
    var amount = $("#amount").val();

    if (date == "") {

      //alert("Please Enter Date");
      swal({
        title: "error!",
        text: "Please insert Date!",
        icon: "error",
        timer: 1500
      })
    } else if (detail == "") {
      //alert("Please Enter Details");
      swal({
        title: "error!",
        text: "Please insert detail!",
        icon: "error",
        timer: 1500
      })
    } else if (amount == "") {
      // alert("Please Enter Amount");
      swal({
        title: "error!",
        text: "Please insert amount!",
        icon: "error",
        timer: 1500
      })
    } else {
      
      // update ajax shortly way //
        var form_data=$("#forminsert").serialize();
        $.ajax({
          type:'post',
          url:'<?= base_url() ?>Expences/update',
          data:form_data,
          success:(function(result){
              if(result=="true")
              {
                //alert("Saved");
                swal({
            title: "updated!",
            text: "successfully updated!",
            icon: "success",
            timer: 1800
          }).then(() => {
            location.reload();
          })
              }
              else if(result=="false"){
                alert("Something Wrong!!");
              }
          }),
          error:(function(){

          })
        });
  
      // update ajax shortly way //

    }
  });   



  </script>