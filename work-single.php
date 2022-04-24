<?php 
include "header.php";
include "admin/conn.php";

$_SESSION["work"] =  $_GET["work"];
    $id = $_SESSION["work"] ;
$sql = "SELECT * FROM our_work_database WHERE id='$id'";
$erorr = [];
$res = mysqli_query($con,$sql);
foreach ($res as $key => $value) {
    $name = $value["work_name"];
    $key_name = $name;
}
if(isset($_POST["submit"])){
  if(!isset($_SESSION["client_id"])){
      echo "register";
      header("location:register.php");
  }  else {
      
        if(empty($_POST['name'])){
            $erorr[] = "name";
        }
        if(empty($_POST['email'])){
            $erorr[] = "email";
        }
        if(empty($_POST['comment'])){
            $erorr[] = "comment";
        }
        if(empty($erorr)){
            $c_name = $_POST["name"];
            $comment = $_POST["comment"];
            $c_email = $_POST["email"];

            
            echo $c_email;
            echo $c_name;
            echo $comment;
            $sql_com = "INSERT INTO comment_chat(first_name,email,comment,activ,images,key_name)
            VALUES('$c_name','$c_email','$comment','yes','$client_image','$name')
            ";
            $RES = mysqli_query($con,$sql_com);
            var_dump($RES);
           
            
        }
  }
}

?>

    <!-- Close Header -->


    <!-- Start Banner Hero -->
    <div id="work_single_banner" class="bg-light w-100">
        <div class="container-fluid text-light d-flex justify-content-center align-items-center border-0 rounded-0 p-0 py-5">
            <div class="banner-content col-lg-8 m-lg-auto text-center py-5 px-3">
                <h1 class="banner-heading h2 pb-5 typo-space-line-center"><?php echo $name; ?>
                </h1>
                <h3 class="h4 pb-2 light-300">Voluptatem accusantium doloremque</h3>
                <p class="banner-footer light-300">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Integer ut ipsum eu libero venenatis euismod.
                </p>
            </div>
        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Work Sigle -->
    <section class="container py-5">

        <div class="row pt-5">
            <div class="worksingle-content col-lg-8 m-auto text-left justify-content-center">
                <h2 class="worksingle-heading h3 pb-3 light-300 typo-space-line"><?php echo $name; ?>  Service</h2>
                <p class="worksingle-footer py-3 text-muted light-300">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div><!-- End Blog Cover -->

        <div class="row justify-content-center pb-4">
            <div class="col-lg-8">
                <div id="templatemo-slide-link-target" class="card mb-3">
                    <img class="img-fluid border rounded" src="./assets/img/work-slide-04.jpg" alt="Card image cap">
                </div>
                <div class="worksingle-slide-footer row">

                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class='bx bxs-chevron-left bx-sm text-dark'></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-06.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-06-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-05.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-05-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-04.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-04-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-03.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-03-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-03.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-03-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-02.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-02-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-06.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-06-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-03.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-03-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-02.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-02-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-06.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-06-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Start Controls-->
                    <div class="col-1 align-self-center text-end">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class='bx bxs-chevron-right bx-sm text-dark'></i>
                        </a>
                    </div>
                    <!--End Controls-->

                </div>
            </div>
        </div><!-- End Slider -->

        <div class="row">
            <div class="col-md-8 m-auto text-left justify-content-center">
                <p class="pt-5 text-muted light-300">
                    You are permitted to download, modify and use Purple Buzz template for your websites. You are <strong>not permitted</strong> to re-distribute this template ZIP file on any other template websites. It is super easy to simply copy and repost the ZIP file on any <a rel="nofollow" href="https://www.google.com/search?q=free+css" target="_blank">Free CSS</a> template websites.
                </p>
            </div>
        </div><!-- End Paragrph -->


        <div class="row">
            <div class="col-md-8 m-auto text-left justify-content-center">
                <p class="display-6 py-4 ps-4 border border-5 border-top-0 border-end-0 border-bottom-0 border-start">
                    <i>
                          "Vestibulum vestibulum est eu lorem laoreet suscipit. Duis auctor,
                          metus vel sollicitudin hendrerit, elit neque pulvinar magna, non
                          sodales orci turpis blandit quam."
                      </i>
                </p>
                <p class="text-muted light-300">
                    Nam tortor quam, aliquet vel nibh sit amet, faucibus bibendum nisl.
                    Donec vehicula nulla justo, vel sodales massa vestibulum nec. Praesent
                    non orci sed massa fringilla rutrum at et odio. Quisque est orci,
                    elementum sed neque ac, suscipit consectetur leo. Cras fermentum luctus
                    cursus. Ut porta, augue vel tempus congue, augue purus vulputate ex,
                    lacinia lobortis arcu metus sed lectus.
                </p>
            </div>
        </div><!-- End Qute -->


        <div class="row justify-content-center">
            <div class="col-lg-8 pt-4 pb-4">
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1z--ZRS5x5U" allowfullscreen></iframe>
                </div>
            </div>
        </div><!-- End Video -->

        <div class="row justify-content-center">
            <div class="col-lg-8 ml-auto mr-auto pt-3 pb-4">
                <p class="text-muted light-300">
                    Ed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                    accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.
                </p>
            </div>
        </div>
        <!-- End Work Sigle -->

        <!-- Start Comment -->
        <div class="row justify-content-center">
            <div class="worksingle-comment-heading col-8 m-auto pb-3">
                <h4 class="h5">Comments</h4>
            </div>
        </div>

        <?php 
        $sql_com_read = "SELECT * FROM comment_chat WHERE activ='yes' AND key_name='$name'";
        $res_com = mysqli_query($con,$sql_com_read);
        
        ?>

      <?php 
      
      foreach ($res_com as $key => $value) {
          ?>
  <div class="row pb-4">
            <div class="col-lg-8 m-auto">
                <div class="d-flex ml-5">
                    <div>
                        <?php
                        if(empty($value['images'])){
                            echo "<div class='p-1 border-0 bg bg-body' class='' ><i class='bx  bx-user-circle bx-md text-primary' style='font-size:55px'></i></div>";

                        } else {
                            ?>
                            <img class="rounded-circle" src="<?php echo $value['images']; ?>" style="width: 50px;">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="comment-body">
                        <div class="comment-header d-flex justify-content-between ms-3">
                            <div class="header text-start">
                                <h5 class="h6"><?php echo $value['first_name']; ?></h5>
                                
                            </div>
                           
                        </div>
                        <div class="footer">
                            <div class="card-body border ms-3 light-300">
                            <?php echo $value['comment']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Comment -->
          <?php
      }
      
      
      ?>


        <div class="row pb-4">
            <div class="worksingle-comment-footer col-lg-8 m-auto">
                <h4 class="h5">Leave Comment</h4>
                <form class="col-md-12 m-auto" method="POST" action="" role="form">

                    <div class="form-group">
                        <label class="pb-2 pt-sm-0 pt-4 light-300" for="inputmessage">Your Comment</label>
                        <textarea class="form-control form-control-lg light-300" id="inputmessage" name="comment" placeholder="Your Comment" rows="5"></textarea>
                    </div>

                    <div class="row py-4">
                        <div class="col-lg-6">
                            <label class="pb-2 light-300" for="inputname">Name</label>
                            <input type="text" class="form-control form-control-lg light-300" id="inputname" name="name" placeholder="Name">
                        </div>
                        <div class="col-lg-6">
                            <label class="pb-2 pt-sm-0 pt-4 light-300" for="inputemail">Email</label>
                            <input type="email" class="form-control form-control-lg light-300" id="inputemail" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row pt-2">
                        <div class="col-md-12 col-10 text-end">
                            <button type="submit" name="submit" class="btn btn-secondary text-white px-md-4 px-2 py-md-3 py-1 radius-0 light-300">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- End Comment Form -->


    </section>
    <!-- End Work Sigle -->

    <!-- Start Related Post -->
    <article class="container-fluid bg-light">
        <div class="container">
            <div class="worksingle-related-header row">
                <h1 class="h2 py-5">Related Post</h1>
                <div class="col-md-12 text-left justify-content-center">
                    <div class="row gx-5">


                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="./assets/img/related-post-01.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">Digital Marketing</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>5
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>3
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="./assets/img/related-post-02.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">App Development</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Tempor incididunt ut labore et dolore.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>11
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>9
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="./assets/img/related-post-03.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">Digital Marketing</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Consectetur adipiscing elit.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>31
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>2
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </article>
    <!-- End Related Post -->


    <!-- Start Footer -->
    <?php include "footer.php"; ?>