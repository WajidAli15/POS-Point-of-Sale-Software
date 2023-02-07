<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Soda Shop</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-6 col-sm-6 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
            <div class="card card-success">
              <div class="card-header">
                <h4>New Register</h4>
              </div>
              <div class="card-body">
                <form id="register_form">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name" autofocus>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email-Username</label>
                    <input id="email" type="email" class="form-control" name="email">
                  </div>
                  <div class="row">
                    <div class="form-group col-12   ">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    </div>
                  </div>
                  <div>
                    <button type="button" id="register_btn" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                    <br>
                    <a href="<?= base_url() ?>Login"><button type="button" class="btn btn-info btn-lg btn-block">
                        Already have account
                      </button></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php
  include('footer.php');
  ?>

</html>

<script>
        $('#register_btn').click(function() {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            if (name == "") {
              swal({
                title: "ooops !!",
                text: "Please Insert Name",
                icon: "error",
              })
            } else if (email == "") {
              swal({
                title: "ooops !!",
                text: "Please Insert email",
                icon: "error",
              })
            } else if (password == "") {
              swal({
                title: "ooops !!",
                text: "Please Insert password",
                icon: "error",
              })
            } else {
              //Getting Data Function //
              var form_data = $("#register_form").serialize();
              event.preventDefault();
              $.ajax({
                type: 'post',
                url: '<?= base_url()?>Users/insert',
                data: form_data,
                success: function(data) {
                  if (data == 'Correct') {
                    swal({
                        title: "Saved !!",
                        text: "Login id is saved",
                        icon: "success",
                        timer: 1500
                          }).then(() => {
                            location.reload();
                          })
                  }
                  else if (data == 'Matched') {
                    swal({
                        title: "Opps !!",
                        text: "This Email is Already Registered",
                        icon: "error",
                        timer: 1500
                          }).then(() => {
                            
                          })
                  }

                   else {
                    alert('data is false');
                  }
                }
              });
            }
            });
</script>