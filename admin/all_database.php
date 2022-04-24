<?php 
  include "header.php"; 
  include "conn.php";
  $sql_corusl = "SELECT * FROM corusel_database";
  $res_corusl = mysqli_query($con,$sql_corusl);
  if(!$res_corusl){
    echo "database false";
  }
?>


<!-- coruserl data -->
    <section class="corusel_data m-5">
        <h2 class="h3 pb-4 typo-space-line">
          
          <p class='alert alert-success'>Activ Coruserl database</p>
        </h2>
        
        <a href="add_corusl.php" type="button" class="btn btn-primary  m-2 ">Add</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Text</th>
                <th scope="col">Url</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              
            <?php foreach ($res_corusl as $key => $corus) :  ?>
              <th scope="row"><?php echo $key + 1; ?></th>
                <td><?php echo $corus['title'] ?></td>
                <td><?php echo $corus['text'] ?></td>
                <td><?php echo $corus['corusel_url'] ?></td>
                <td>
                    <a href="edit_corusel.php?edit_corus=<?php echo $corus['id']; ?>" type="button" class="btn btn-success text-white">Edit</a>
                    <a href="delete_corusl.php?delet_corus=<?php echo $corus['id']; ?>" type="button" class="btn btn-danger text-white">Delete</a>
                </td>
              </tr>

            <?php endforeach;       ?>
            <tr>
              
          
            </tbody>
          </table>
    </section>
 <!-- Services database -->
    <?php

      $sql_ser = "SELECT * FROM services_database";
      $res_ser = mysqli_query($con,$sql_ser);
      if(!$res_ser){
        echo " <p class='alert alert-danger'>Servise database erorr </p>";
      }

    ?>

    <section class="services_database m-5">
        <h2 class="h3 pb-4 typo-space-line">
        <p class='alert alert-success'>Activ Services database</p></h2>
          
        </h2>
        <a href="add_servise.php" type="button" class="btn btn-primary  m-2 ">Add Services </a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Servise title</th>
                <th scope="col">Servise text</th>
                <th scope="col">Servise filter key</th>
                <th scope="col">Servise image</th>
                <th scope="col">Servise url</th>
                
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              
            <?php
            foreach ($res_ser as $key => $ser) :  ?>
              <tr>
                <th scope="row"><?php echo $key + 1; ?></th>
                <td><?php echo $ser['sevise_title']; ?></td>
                <td><?php echo $ser['servise_text']; ?></td>
                <td><?php echo $ser['servise_filter_key']; ?></td>
                <td >
                  <img src="<?php echo $ser['servise_image']; ?>" alt="" style="width:100px">  
                </td>
                <td><?php echo $ser['servise_url'] ?></td>
              
                <td>
                    <a href="edit_servis.php?edit=<?php echo $ser['id']; ?>" type="button" class="btn btn-success text-white">Edit</a>
                    <a href="delete_servis.php?delete=<?php echo $ser['id']; ?>" type="button" class="btn btn-danger text-white">Delete</a>
                </td>
              </tr>

            <?php endforeach;   ?>
          
            </tbody>
          </table>
    </section>
 <!-- Recent Works database -->
<?php 

  $sql_recent = "SELECT * FROM recent_works_database";
  $res_recent = mysqli_query($con,$sql_recent);


?>
    <section class="recent_works_database m-5">
        <h2 class="h3 pb-4 typo-space-line">
         
          <p class='alert alert-success'>Activ Recent Works database</p>
        </h2>
        <a href="add_recent.php" type="button" class="btn btn-primary  m-2 ">Add Works </a>
       <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Recent title</th>
            <th scope="col">Recent description</th>
            <th scope="col">Recent image</th>
            <th scope="col">Recent url</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($res_recent as $key => $recent) : ?>
          <tr>
            <th scope="row"><?php echo $key +1; ?></th>
            <td><?php echo $recent["recent_title"]; ?></td>
            <td><?php echo $recent["recent_desk"]; ?></td>
            <td><img src="<?php echo $recent["recent_image"]; ?>" style="width:100px" alt=""></td>
            <td><?php echo $recent["recent_url"]; ?></td>
            <td>
                <a href="edit_recent.php?edit=<?php echo $recent["id"]; ?>" type="button" class="btn btn-success text-white">Edit</a>
                <a href="delet_recent.php?delet=<?php echo $recent["id"]; ?>" type="button" class="btn btn-danger text-white">Delete</a>
            </td>
          </tr>
         <?php endforeach; ?>
        
        </tbody>
      </table>
    </section>
<!-- cOur Team database -->

<?php 

          $sql_team = "SELECT * FROM our_team_database";
          $res_team = mysqli_query($con,$sql_team);
          if(!$res_team){
            echo "data team not erorr";
          }


?>
     <section class="our_team_database m-5">

     
        <h2 class="h3 pb-4 typo-space-line">
         <p class='alert alert-success'>Activ Our Team database</p>
          
        </h2>
        <a href="add_team.php" type="button" class="btn btn-primary  m-2 ">Add Our Team </a>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Team person name</th>
                  <th scope="col">Team person job</th>
                  <th scope="col">Team person image</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
              <?php  foreach ($res_team as $key => $team) :?>
                <tr>
                  <th scope="row"><?php echo $key + 1; ?></th>
                  <td><?php echo $team['team_person_name']; ?></td>
                  <td><?php echo $team['team_person_job']; ?></td>
                  <td><img src="<?php echo $team['team_person_image']; ?>"  style="width:100px;" alt=""></td>
                  <td>
                      <a href="edit_team.php?edit=<?php echo $team["id"]; ?>" type="button" class="btn btn-success text-white">Edit</a>
                      <a href="delet_team.php?delet=<?php echo $team["id"]; ?>" type="button" class="btn btn-danger text-white">Delete</a>
                  </td>
                </tr>

              <?php endforeach;     ?>
      
              </tbody>
            </table>
    </section>









    <!-- Close Header -->
    <?php include "footer.php"; ?>
