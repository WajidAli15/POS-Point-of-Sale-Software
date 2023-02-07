<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>assets/img/favicon.ico' />
</head>

<body  style="background-color: white;">
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="row">
                        <!-- LEFT SIDE -->
                        <div class="col-md-8 col-lg-8 col-sm-8">
                            <div class="align-items-center justify-content-between">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <!--- Show the Branch Name (Information) in Login Page ---->
                                        <?php
                                        		$shopinfo=$this->db->query("select * from branch_table where id='1' ")->result()[0];
                                        ?>
                                        <h4 class="font-45"> <?= $shopinfo->name ?></h4>
                                        <h2 class="mb-3 font-35"><?= $shopinfo->address ?></h2>
                                        <h2 class="mb-3 font-25"><?= $shopinfo->phone ?></h2>
                                    </div>
                                    <div class="banner-img">
                                        <img src="<?= base_url() ?>assets/img/login.svg" style="width:100%;" alt="" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- LEFT SIDE -->
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form id="user">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus required>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>

                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>

                                    </div>

                                    <div class="form-group">
                                        <button type="button" id="btn_login" class="btn btn-primary btn-lg btn-block">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="<?=base_url()?>Users">Create One</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

</html>
<?php
include('footer.php');
?>

<script>
    $(document).on('click', '#btn_login', function() {

        var email = $('#email').val();
        var password = $('#password').val();
        if (email == "" || password == "") {
            alert("plz enter email and password")
        } else {
            $.ajax({
                method: "post",
                url: '<?= base_url() ?>Login/check',
                data: {
                    email: email,
                    password: password
                },

                success: function(data) {
                    if (data == 'Corect') {
                        swal({
                                title: "Login",
                                text: "successfully",
                                icon: "success",
                                timer: 1500
                            }).then(() => {
                                window.location = "<?= base_url(); ?>Dashboard";
                                })
                    } else {
                        alert('not login');
                    }
                }

            })
        }
    })
</script>