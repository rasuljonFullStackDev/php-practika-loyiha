<?php 
include "header.php"; 
include "conn.php";





?>




<!-- Admin user -->
<?php 
$sql_admin = "SELECT * FROM admin_log_in";
$res_admin = mysqli_query($con,$sql_admin);




?>

<section class="contact m-5 container">
    <h2 class="h3 pb-4 typo-space-line">Admin user</h2>
    <a href="add_admin.php" type="button" class="btn btn-primary  m-2 ">Add admin </a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Image</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
       <?php 
       
       foreach ($res_admin as $key => $res) :?>


          <tr>
            <th scope="row"><?php echo $key + 1; ?></th>
            <td><?php echo $res["username"]; ?></td>
            <td><?php echo $res["password"]; ?></td>
            <td><img src="<?php echo $res["admin_img"]; ?>" style="width:100px;" alt=""></td>
            <td>
                <a href="edit_admin.php?edit=<?php echo $res["id"]; ?>" type="button" class="btn btn-success text-white">Edit</a>
                <a href="delet_admin.php?delet=<?php echo $res["id"]; ?>" type="button" class="btn btn-danger text-white">Delete</a>
            </td>
          </tr>

       


       <?php endforeach; ?>
        </tbody>
      </table>
</section>
<!-- Register user -->
<section class="contact m-5 container">
    <h2 class="h3 pb-4 typo-space-line">Register user</h2>
    <button type="button" class="btn btn-primary  m-2 ">Add user </button>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <button type="button" class="btn btn-success text-white">Edit</button>
                <button type="button" class="btn btn-danger text-white">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <button type="button" class="btn btn-success text-white">Edit</button>
                <button type="button" class="btn btn-danger text-white">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <button type="button" class="btn btn-success text-white">Edit</button>
                <button type="button" class="btn btn-danger text-white">Delete</button>
            </td>
          </tr>
          
        </tbody>
      </table>
</section>

<?php include "footer.php";?>