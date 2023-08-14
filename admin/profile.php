<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include_once('controllers/CategoryController.php');
include_once('controllers/CustomerController.php');
include('controllers/AdminController.php');
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
</style>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Users</h4>
                    <?php include('../message.php'); ?>
                    <!-- Button trigger modal -->


                </div>
                <div class="card-body">
                    <form method="POST" action="codes/change-admin-password.php">
                          <?php
                                            if (isset($_SESSION['authenticated'])) {
                                            ?>
                                                <input type="hidden" name="admin_id" value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                            <?php
                                            }
                                            ?>
                        <div class="form-group">
                        <label>Email</label>
                         </div>
                        <input class="form-control" type="email" required name="username">
                        <div class="form-group">
                        <label>Password</label>
                          <input class="form-control" type="text" required name="password">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myproductTable').DataTable();
    });
</script>

<?php
include('inc/footer.php');
?>