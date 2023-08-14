<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('../config/app.php');
include('../controllers/AuthenticationController.php');
include('codes/auth-code.php');
include('controllers/AdminController.php');

$authenticated = new AuthenticationController;
$authenticated->admin();
include('inc/header.php');
include('inc/sidebar.php');
?>
<style>
    .panel-header{
        height:154px;
    }
    .sales-icons{
        margin-top:0;
    }
    .sales-icons .style-1{
        
    padding: 8px;
    border-radius: 100%;
    width: 44px;
    text-align: center;
    height: 44px;
    }
    
    .sales-icons .fa-shopping-cart{
        color: #18ab0d;
    background: #d2f6d0;
    }
    
   .sales-icons .fa-list{
        color: #920887;
    background: #f6d0f3;
   }
   
   .sales-icons .fa-truck{
         color: #0d60ab;
    background: #d0e5f6;
   }
</style>
<div class="panel-header">
        <!--<canvas id="bigDashboardChart"></canvas>-->
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Total Sales</h4>
               
              </div>
              <div class="card-body">
                <div class="">
                <?php
                $productsdata = new AdminController;
                $tot_sales_products = $productsdata->totalSales();
                // print_r($tot_sales_products);
                if($tot_sales_products){
                ?>
            
                <h4 class="sales-icons"><i class="fa fa-shopping-cart style-1"></i> ₹ <?php echo $tot_sales_products;?></h4>
                <?php
                }
                else{
                ?>
                <h2>No Data Found</h2>
                <?php
                }
                ?>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                
                <h4 class="card-title">Shipped Products</h4>
             
              </div>
              <div class="card-body">
                <div class="">
              <?php
                $totshippedproducts = $productsdata->getShippedproducts();
                // print_r($tot_shippped_products);
                if($totshippedproducts){
                ?>
            
                <h4 class="sales-icons"><i class="fa fa-truck style-1"></i> <?php echo $totshippedproducts;?></h4>
                <?php
                }
                else{
                ?>
                <h2>No Data Found</h2>
                <?php
                }
                ?>
                </div>
              </div>
            
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Total Orders</h4>
              </div>
               <div class="card-body">
                <div class="">
              <?php
                $totorders = $productsdata->gettotalOrders();
                // print_r($tot_shippped_products);
                if($totorders){
                ?>
            
                <h4 class="sales-icons"><i class="fa fa-list style-1"></i> <?php echo $totorders;?></h4>
                <?php
                }
                else{
                ?>
                <h2>No Data Found</h2>
                <?php
                }
                ?>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row">
   
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> New Orders List</h4>
              </div>
              <div class="card-body">
                 <div class="d-flex justify-content-end">
                     <div>
                         <label>Select Days</label>
                         <select class="form-control" id="daysorder">
                             <option value="">Default</option>
                             <option value="7">7 days</option>
                             <option value="15">15 days</option>
                             <option value="30">30 days</option>
                         </select>
                     </div>
                      <div>
                         <label>Order By</label>
                         <select class="form-control" id="statusorder">
                             <option value="">Default</option>
                             <option value="Shipped">Processing</option>
                             <option value="Cancelled">Cancel</option>
                             <option value="Return">Return</option>
                         </select>
                     </div>
                 </div>
                <div class="table-responsive">
                  <table class="table" id="myproductTable">
                    <thead class=" text-primary">
                      <th>
                       Id
                      </th>
                      <th>
                     Customer Name
                      </th>
                      <th>
                        Total
                      </th>
                      <th >
                        Payment
                      </th>
                      <th>
                          Action
                      </th>
                    </thead>
                    <tbody id="load-orders-all">
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
    // $(document).ready(function() {
    //     $('#myproductTable').DataTable();
    // });
    $('#statusorder').on('change', function(){
        let statval = $(this).val();
        let daysorder = $('#daysorder').val();
         loadOrders(daysorder, statval);
    })
      $('#daysorder').on('change', function(){
        let statval = $('#statusorder').val();
        let daysorder = $(this).val();
        loadOrders(daysorder, statval);
    })
    loadOrders();
    function loadOrders(daysorder='', statusorder=''){

            $.ajax({
                url:"codes/orders.php",
                method:"POST",
                data:{daysorder:daysorder,statusorder:statusorder,action:"load-recentorders"},
                success:function(data)
                {
                    $('#load-orders-all').html(data);
                }
            });
      
    }
      </script>
<?php
include('inc/footer.php');

?>