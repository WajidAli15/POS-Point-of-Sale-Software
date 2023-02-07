<?php
include('header.php');
?>

<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pr-0 pt-3">
                  <div class="card-content">

                    <h5 class="font-30"> <?= $shop_info->name ?></h5>
                    <h2 class="mb-3 font-20"><?= $shop_info->address ?></h2>
                    <p class="mb-3 font-15"><?= $shop_info->phone ?> </p>
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pl-0">
                  <div class="banner-img">
                    <img src="<?= base_url() ?>assets/img/banner/1.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="<?= base_url() ?>Branch_user">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3" style="background-color: #6ca1a0;">
                    <div class="card-content">
                      <h5 class="font-15"> Branches User</h5>
                      <h2 class="mb-3 font-18"><?= $count_data2->id ?></h2>
                      <p class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0" style="background-color: #6ca1a0;">
                    <div class="banner-img">
                      <img src="<?= base_url() ?>assets/img/banner/2.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="<?= base_url() ?>Newproducts">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3" style="background-color: #6ca1a0;">
                    <div class="card-content">
                      <h5 class="font-15">Products</h5>
                      <h2 class="mb-3 font-18"><?= $count_product->id ?></h2>
                      <p class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0" style="background-color: #6ca1a0;">
                    <div class="banner-img">
                      <img src="<?= base_url() ?>assets/img/banner/1.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="<?= base_url() ?>Catagory">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3" style="background-color: #6ca1a0;">
                    <div class="card-content">
                      <h5 class="font-15">Catagory</h5>
                      <h2 class="mb-3 font-18"><?= $count_catagory->id ?></h2>
                      <p class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0" style="background-color: #6ca1a0;">
                    <div class="banner-img">
                      <img src="<?= base_url() ?>assets/img/banner/4.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="<?= base_url() ?>Sale">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3" style="background-color: #6ca1a0;">
                    <div class="card-content">
                      <h5 class="font-15">Sell</h5>
                      <h2 class="mb-3 font-18"><?= $sum_total->total ?></h2>
                      <p class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0" style="background-color: #6ca1a0;">
                    <div class="banner-img">
                      <img src="<?= base_url() ?>assets/img/banner/4.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="<?= base_url() ?>Sell_dashboard">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3" style="background-color: #6ca1a0;">
                    <div class="card-content">
                      <h5 class="font-15">Total Bills</h5>
                      <h2 class="mb-3 font-18"><?= $count_bill->id ?></h2>
                      <p class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0" style="background-color: #6ca1a0;">
                    <div class="banner-img">
                      <img src="<?= base_url() ?>assets/img/banner/4.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="<?= base_url() ?>Expences">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3" style="background-color: #6ca1a0;">
                    <div class="card-content">
                      <h5 class="font-15"> Expences </h5>
                      <h2 class="mb-3 font-18"><?= $sum_expence->amount ?></h2>
                      <p class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0" style="background-color: #6ca1a0;">
                    <div class="banner-img">
                      <img src="<?= base_url() ?>assets/img/banner/2.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="<?= base_url() ?>Manage_supplier">
          <div class="card">
            <div class="card-statistic-4">
              <div class="align-items-center justify-content-between">
                <div class="row ">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3" style="background-color: #6ca1a0;">
                    <div class="card-content">
                      <h5 class="font-15">Supplier Registaions</h5>
                      <h2 class="mb-3 font-18"><?= $count_supplier->id ?></h2>
                      <p class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0" style="background-color: #6ca1a0;">
                    <div class="banner-img">
                      <img src="<?= base_url() ?>assets/img/banner/3.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    </a>
</div>
</section>
</div>


<?php
include('footer.php');
?>

<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>