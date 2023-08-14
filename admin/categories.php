<?php
include('../config/app.php');
include('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();
include('codes/auth-code.php');
include_once('controllers/CategoryController.php');
include('controllers/AdminController.php');
include('inc/header.php');
include('inc/sidebar.php');
?>
<style>
  .form-group input[type=file] {
    position: unset;
    opacity: 1;
  }

  .form-check input[type="checkbox"],
  .radio input[type="radio"] {
    visibility: visible;
    opacity: 1;
  }

  #catname_err {
    display: none;
    color: red;
  }

  #caturl_err {
    display: none;
    color: red;
  }

  .category-list {
    list-style: none;
  }

  .category-list-items p {
    font-size: 18px;
  }

  .category-list-items {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
  }
</style>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Categories</h4>
          <?php include('../message.php'); ?>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Category
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="codes/category-code.php" enctype="multipart/form-data" method="POST" onsubmit="return Validate()">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="category_name" class="form-control" id="catname" placeholder="Enter Category Name">
                      <small class="invalid-error" id="catname_err">Can Not be empty</small>
                    </div>
                    <!-- <div class="form-group">
                      <label>Parent Category</label>
                      <select name="parent_category" class="form-control" id="">
                        <option value="0">--Select Parent Category--</option>
                        <?php
                        $categories = new CategoryController;
                        $result = $categories->index();
                        if ($result) {
                          foreach ($result as $row) {
                        ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['cat_name'] ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>

                    </div> -->
                    <div class="form-group">
                      <label>URL</label>
                      <input type="text" name="category_url" onchange="convertTourl()" id="slug-source" class="form-control" placeholder="URL">
                      <small class="invalid-error" id="caturl_err">Can Not be empty</small>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="category_image" class="form-control" placeholder="URL">

                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" name="category_description" class="form-control" id="" cols="10" rows="10"></textarea>
                    </div>
                    <button type="submit" name="add_category" class="btn btn-primary">Submit</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $categories = new CategoryController;
                $allcategories =  $categories->index();
                $count = 1;
                if ($allcategories) {
                  foreach ($allcategories as $cats) {
                ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php if ($cats['status'] == '0') {
                            echo "<span class='badge badge-success'>Active</span>";
                          } else {
                            echo "<span class='badge badge-danger'>Draft</span>";
                          } ?>
                        <?php echo $cats['cat_name'] ?></td>
                      <td >
                         
                        <form action="codes/category-code.php" class="form-inline" method="POST">

                          <input type="hidden" value="<?php echo $cats['id'] ?>" name="categoryid">
                          <div class="form-group mx-sm-3 mb-2">
                            <select name="showcategory" class="form-control" id="">
                              <option value="1">Hide</option>
                              <option value="0">show</option>
                            </select>
                          </div>
                          <button type="submit" name="update-status" class="btn btn-info">Update</button>
                        </form>
                      </td>

                      <td style="display:flex; justify-content:space-around;">
                        <a class="btn btn-success" href="edit-categories.php?id=<?php echo $cats['id'] ?>"> <i class="fa fa-edit"></i> </a>
                        <form onsubmit="return confirmDelete()" action="codes/category-code.php" method="POST">
                          <input type="hidden" name="categoryid" value="<?php echo $cats['id'] ?>">
                          <button class="btn btn-danger" name='deletecatid' type="submit"> <i class="fa fa-trash-alt"></i> </button>
                        </form>
                      </td>
                    </tr>
                <?php
                    $count++;
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
  function confirmDelete() {
    var txt;
    if (confirm("Are You Sure Want To Delete?")) {
      return true;
    } else {
      return false;
    }
  }

  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  function Validate() {
    let catname = document.getElementById("catname").value;
    let caturl = document.getElementById("slug-source").value;
    let catname_err = document.getElementById("catname_err");
    let caturl_err = document.getElementById("caturl_err");
    if (catname != '' && caturl != '') {
      caturl_err.style.display = "none";
      catname_err.style.display = "none";
      return true;
    } else {
      catname_err.style.display = "block";
      caturl_err.style.display = "block";
      return false;
    }
  }

  function convertTourl() {

    var a = document.getElementById("slug-source").value;

    var b = a.toLowerCase().replace(/ /g, '-')
      .replace(/[^\w-]+/g, '');

    document.getElementById("slug-source").value = b;
  }
</script>

<?php
include('inc/footer.php');
?>