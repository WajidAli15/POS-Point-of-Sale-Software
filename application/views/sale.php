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
                    <h4>Sale</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Sr#</th>
                            <th>Datetime</th>
                            <th>Bill No</th>
                            <th>Item</th>
                            <th>Total Item</th>
                            <th>Total </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <!-- Php Code Start here -->
                            <?php
                            //-- Create Variable for Series --//
                              $sr=0;
                            //-- Create Variable for Series --//

                            //-- Create Variable for Total Item --//
                            $totalitem=0;
                            //-- Create Variable for Total Item --//
                            
                            foreach($table_data as $value)
                            {
                              //-- Add Double Concate in Series variable for creating series row --//
                              $sr++;
                              //-- Add Double Concate in Series variable for creating series row --//

                              //-- Starting First Loop Values showing from Controler Query --//
                              echo'
                              <tr>
                                      <td>'.$sr.'</td>
                                      <td>'.$value->datetime.'</td>
                                      <td>'.$value->billno.'</td>
                                      <td>
                                ';
                              //-- Starting First Loop Values showing from Controler Query --//

                              //-- Sindhi Tareeka Start Here --//
                              
                              //-- Create Variable For Getting data from Sindhi Query --//
                              $bill=$value->billno;
                              //-- Create Variable For Getting data from Sindhi Query --//

                              //-- Geting Data from saledetail using Sindhi Tareeka Query ==//
                              $sindhi_tareko=$this->db->query("select sd.qty,p.product from saledetail sd inner join newproduct p on p.id=sd.pid where sd.billno='$bill'")->result();
                              //-- Geting Data from saledetail using Sindhi Tareeka Query ==//

                              //-- Start Second Loop --//
                              foreach($sindhi_tareko as $v1)
                              {
                                $totalitem+=$v1->qty;
                                echo'
                                      '.$v1->qty.' X '.$v1->product.'
                                      <br>
                                      ';
                              }
                              //-- Start Second Loop --//
                              echo'
                              </td>
                              <td>'.$totalitem.'</td>
                              <td>'.$value->total.'</td>
                              <td><button type="button" class="btn btn-success"> <i class="fa fa-print"></i></button>
                              <button type="button" class="btn btn-danger"> <i class="fa fa-trash"></i></button></td>
                              </tr>';
                              $totalitem=0;
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
<?php
include('footer.php');
?>
