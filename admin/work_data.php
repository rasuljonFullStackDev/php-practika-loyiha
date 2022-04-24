<?php include "header.php"; ?>

<!-- Work -->
<?php

$sql_w = "SELECT * FROM our_work_database";
$res_w = mysqli_query($con,$sql_w);


?>
<section class="pricing m-5">
    <h2 class="h3 pb-4 typo-space-line">Work database</h2>
    <a href="add_work.php" type="button" class="btn btn-primary  m-2 ">Add Price </a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Project name</th>
            <th scope="col">Project describe</th>
            <th scope="col">project filter key</th>
            <th scope="col">project image</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
    <?php 
    foreach ($res_w as $key => $work) : ?>
            <tr>
            <th scope="row"><?php echo $key + 1; ?></th>
            <td><?php echo $work['work_name']; ?></td>
            <td><?php echo $work['work_descr']; ?></td>
            <td><?php echo $work['filter_key']; ?></td>
            <td><img src="<?php echo $work['image'];  ?>" style="width:100px;" alt=""></td>
         
            <td>
                <a href="edit_work.php?edit=<?php echo $work["id"]; ?>" type="button" class="btn btn-success text-white">Edit</a>
                <a href="delete_work.php?delet=<?php echo $work["id"]; ?>" type="button" class="btn btn-danger text-white">Delete</a>
            </td>
          </tr>
      

      <?php endforeach;  ?>
          
        </tbody>
      </table>
</section>
<!-- Our Pricing -->
<section class="our_pricing m-5">
    <h2 class="h3 pb-4 typo-space-line">Our Pricing database</h2>
    <button type="button" class="btn btn-primary  m-2 ">Add Our  Pricing </button>
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

<?php include "footer.php"; ?>
