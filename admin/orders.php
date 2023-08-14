<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include_once('controllers/CategoryController.php');
include_once('controllers/ProductController.php');
include('controllers/AdminController.php');
include_once('controllers/OrderController.php');
include_once('controllers/ShiprocketController.php');
include('codes/auth-code.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
<style>
    #catname_err {
        display: none;
        color: red;
    }

    #caturl_err {
        display: none;
        color: red;
    }

    .fa-ellipsis-h {
        transform: rotate(90deg);
    }
    
    .order_status_btn{
        display:none;
    }
    #shipbutton{
        display:none
    }
</style>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Orders</h4>
                    <?php include('../message.php'); ?>
                    <!-- Button trigger modal -->


                </div>
                <div class="card-body">
                     <form class="pull-right" method="POST" action="codes/export-orders.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Select Format</label>
                                    <select required class="form-control" required name="file_type">
                                        <option>--Export--</option>
                                        <option value="csv">CSV</option>
                                        <option value="xlsx">XLSX</option>
                                        <option value="xls">XLS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="">Select Starting date</label>
                                    <input required type="date" class="form-control" name="start_date" placeholder="">
                                </div>
                                   <div class="form-group">
                                <label for="">Select End date</label>
                                    <input required type="date" class="form-control" name="end_date" placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" name="export" class="btn btn-secondary btn-sm pull-right">Click To Export</button>
                        </div>
                    </form>
                    <a href="javascript:void(0)" id="shipbutton" class="btn btn-info">Ship Multiple Orders</a>
                    <div class="table-responsive">
                        <?php
                        $orders = new OrderController;
                        $result = $orders->index();
                        ?>
                        <table class="table" id="myproductTable">
                            <thead class=" text-primary">
                                <th>#</th>
                                <th>Order Number</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Total</th>
                            
                                <th>Edit</th>
                            </thead>
                            <tbody>
                                <?php
                                if ($result) {
                                
                                    foreach ($result as $row) {
                                    
                                ?>
                                        <tr>
                                        <td><input type="checkbox" value="<?php echo $row['order_number'] ?>" class="orderids"></td>
                                            <td><?php echo $row['order_number'] ?></td>
                                            <td>
                                                <?php echo date("m-d-Y", strtotime($row["ordered_on"])) ?>
                                            </td>
                                            <td><?php echo $row['ship_firstname'] ?> <?php echo $row['ship_lastname'] ?>
                                            </td>
                                            <td><?php echo $row['payment_info']; ?> 
                                            <?php
                                            if($row['payment_status'] == 'success'){
                                                echo "<span class='badge badge-success'>success</span>";
                                            }
                                            ?>
                                            </td>
                                            <td>
                                                <?php
                                               $itemstatus = $orders->getOrderitemstatus($row['orderitemid']);
                                                ?>
                                      
                                             <?php echo $itemstatus; ?> 

                                            <?php
                                           
                                           if(!empty($row['shiprocket_orderid'])){
                                         
                                               $shipstatus = new ShiprocketController;
                                               $getshipstatus = $shipstatus->getshipStatus($row['shiprocket_orderid']);
                                               if($getshipstatus){
                                          
                                               echo "<span>Shiprocket Status : $getshipstatus </span>";
                                               }
                                           }
                                           else{
                                           ?>

                                                <?php
                                                if ($itemstatus == 'Order Placed') {
                                                    echo "<span class='badge badge-info'>New</span>";
                                                }
                                                ?>
                                                 <?php
                                                if ($itemstatus == 'Delivered') {
                                                    echo "<span class='badge badge-success'>Delivered</span>";
                                                }
                                                ?>
                                               
                                                  <?php
                                                if ($itemstatus == 'On hold') {
                                                    echo "<span class='badge badge-primary'>On hold</span>";
                                                }
                                                ?>
                                                  <?php
                                                if ($itemstatus == 'Pending') {
                                                    echo "<span class='badge badge-warning'>Pending</span>";
                                                }
                                                ?>
                                                     <?php
                                                if ($itemstatus == 'Cancelled') {
                                                    echo "<span class='badge badge-danger'>Cancelled</span>";
                                                }
                                                ?>
                                                     <?php
                                                if ($itemstatus == 'Shipped') {
                                                    echo "<span class='badge badge-secondary'>Shipped</span>";
                                                }
                                                ?>
                                                       <?php
                                                if ($itemstatus == 'Refund') {
                                                    echo "<span class='badge badge-danger'>Refund</span>";
                                                }

                                            }
                                                ?>
                                               
                                            </td>
                                            <td>&#x20B9 <?php echo $row['total']  * $row['item_quantity']; ?></td>
                                      
                                            <td style="display:flex;">
                                                <a class=" mx-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="edit-order.php?id=<?php echo $row['orderitemid']?>">Edit</a>
                                                    <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                                </div>
                                            </td>

                                        </tr>
                                <?php

                                    }
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

<script>

 $(document).on('change', '.orderedstatus', function() {
      var btnstatus = $(this).closest('.order_status_form').find('.order_status_btn');
      btnstatus.show();
      
 });

 $('.orderids').on('click', function(){
    $('#shipbutton').show();
 });

 $('#shipbutton').click(function(){
        var ordersids = [];
        $('.orderids:checked').each(function(i){
            ordersids[i] = $(this).val();
        });
        $.ajax({
                url: "codes/multiple-shipped-orders.php",
                method: "post",
                data: {
                    ordersids:ordersids,
                    action: 'bulk-shipped'
                },
                success: function(data) {
                    if (data == 'success') {
                        alert("Status Updated Successfully");
                        location.reload();
                    }
                    else{
                        alert("Status Not Updated");
                    }
                }

            });
      });

  $(document).on('click', '.order_status_btn', function() {
        var status = $(this).closest('.order_status_form').find('.orderedstatus').val();
        // alert(status);
      if(status == 'Delivered'){
              if (confirm("By clicking OK you are agreed that you have received the payment")) {
            return true;
        } else {
            return false;
        }
        }
        else if(status == 'Cancel'){
                  if (confirm("Are Yo sure want to cancel this order")) {
            return true;
        } else {
            return false;
        } 
        }
        else if(status == ''){
          alert("Please Select a value");
             return false;
        }
        else{
            return true;
        }
        
        // if(status == 'Delivered'){
        //     alert("bhdj");
        //     if (confirm("Are You Sure Want To Delete?")) {
        //     return true;
        // } else {
        //     return false;
        // }
        // }
    });

  
    function confirmDelete() {
        var txt;
        if (confirm("Are You Sure Want To Delete?")) {
            return true;
        } else {
            return false;
        }
    }

    $(document).ready(function() {
        $('#myproductTable').DataTable({
            "ordering": false
        });
    });
    
  
</script>

<?php
include('inc/footer.php');
?>