<?php 
    include 'db_config.php';

    $about_sql = "SELECT * FROM about";
    $result = mysqli_query($con,$about_sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $name = explode (' ',$name);

    
    $ex_sql = "SELECT * FROM ex_table";
    $ex_result = mysqli_query($con, $ex_sql);
    $ex_rows = mysqli_fetch_assoc($ex_result);

  
    $edu_sql = "SELECT * FROM edu_table";
    $edu_result = mysqli_query($con, $edu_sql);
    $edu_rows = mysqli_fetch_assoc($edu_result);


    $ski_sql = "SELECT * FROM ski_table";
    $ski_result = mysqli_query($con, $ski_sql);
    $ski_query = mysqli_query($con, $ski_sql);
    $ski_rows = mysqli_num_rows($ski_result);

    
    $interest_sql = "SELECT * FROM  interest_table";
    $interest_result = mysqli_query($con, $interest_sql);
    $interest_row = mysqli_fetch_assoc($interest_result);

 
    $sql = "SELECT * FROM about";
    $result = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($result);

    // var_dump ($name);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Saikat Mondal </title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">prince</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo $row['image']; ?>" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                    <?php echo $name[0]; ?>
                        <span class="text-primary"><?php echo($name[1]); ?></span>
                    </h1>
                    <div class="subheading mb-5">
                       <?php echo $row['address']; ?> 
                        <a href="mailto:'<?php echo $row['email']; ?>'"><?php echo $row['email']; ?></a>
                    </div>
                    <p class="lead mb-5"><?php echo $row['description']; ?></p>
                    <div class="social-icons">
                        <a class="social-icon" href="<?php echo $row['linkedin']; ?>"target ="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="social-icon" href="<?php echo $row['github']; ?>"target = "_blank"><i class="fab fa-github"></i></a>
                        <a class="social-icon" href="<?php echo $row['facebook'];?>"target = "_blank"><i class="fab fa-facebook"></i></a>
                        
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php
                                    // for ($i = 0; $i <2; $i++) {
                                    //     $ex_rows = mysqli_fetch_assoc($ex_result);
                                    // }
                                    echo $ex_rows['designation'];
                                ?></h3>
                            <div class="subheading mb-3"> <?php
                                    echo $ex_rows['company']; 
                                ?></div>
                                <p>
                                    <?php                                
                                        echo $ex_rows['role']; 
                                    ?>
                                </p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php
                                    echo $ex_rows['period']; 
                                ?>
                                </span></div>
                    </div>
                    <!-- <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Web Developer</h3>
                            <div class="subheading mb-3">Intelitec Solutions</div>
                            <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
                        </div> -->
                        <!-- <div class="flex-shrink-0"><span class="text-primary">December 2011 - March 2013</span></div> 
                    </div>-->
                    <!-- <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Junior Web Designer</h3>
                            <div class="subheading mb-3">Shout! Media Productions</div>
                            <p>Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.</p>
                        </div> 
                        <div class="flex-shrink-0"><span class="text-primary">July 2010 - December 2011</span></div>
                    </div>-->
                     <!--<div class="d-flex flex-column flex-md-row justify-content-between">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">Web Design Intern</h3>
                            <div class="subheading mb-3">Shout! Media Productions</div>
                            <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">September 2008 - June 2010</span></div> 
                    </div>
                </div>
            </section>
            <hr class="m-0" />-->
            <!-- Education-->
            <section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Education</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php
                                    // mysqli_data_seek($edu_result, 0);
                                    // for ($i = 0; $i <= 0; $i++) {
                                    // $edu_row = mysqli_fetch_assoc($edu_result); 
                                    // }
                                    echo $edu_rows['institute'];
                                ?></h3>
                            <div class="subheading mb-3"><?php echo $edu_rows['degree']; ?></div>
                            <!-- <div>Computer Science - Web Development Track</div> -->
                            <p><?php echo $edu_rows['score']; ?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php echo $edu_rows['period']; 
                        ?></span></div>
                    </div>
                    <!-- <div class="d-flex flex-column flex-md-row justify-content-between">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">James Buchanan High School</h3>
                            <div class="subheading mb-3">Technology Magnet Program</div>
                            <p>GPA: 3.56</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">August 2002 - May 2006</span></div>
                    </div> 
                </div>
            </section>
            <hr class="m-0" />-->
            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">
                        <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                        <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                        <li class="list-inline-item"><i class="fab fa-angular"></i></li>
                        <li class="list-inline-item"><i class="fab fa-react"></i></li>
                        <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
                        <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                        <li class="list-inline-item"><i class="fab fa-less"></i></li>
                        <li class="list-inline-item"><i class="fab fa-wordpress"></i></li>
                        <li class="list-inline-item"><i class="fab fa-gulp"></i></li>
                        <li class="list-inline-item"><i class="fab fa-grunt"></i></li>
                        <li class="list-inline-item"><i class="fab fa-npm"></i></li>
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            <?php
                                    // mysqli_data_seek($sk_result, 0);
                                    // for ($i = 0; $i <= 0; $i++) {
                                    // $sk_row = mysqli_fetch_assoc($sk_result); 
                                    // }
                                    echo $ski_rows['skill'];
                                ?>
                        </li>
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Cross Browser Testing & Debugging
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Cross Functional Teams
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-check"></i></span>
                            Agile Development & Scrum
                        </li>
                    </ul>
                </div>
            </section>
            <hr class="m-0" />
            <!-- Interests-->
            <section class="resume-section" id="interests">
                <div class="resume-section-content">
                    <h2 class="mb-5">Interests</h2>
                    <p><?php
                            // mysqli_data_seek($int_result, 0);
                            // for ($i = 0; $i <= 0; $i++) {
                            // $int_row = mysqli_fetch_assoc($int_result); 
                            // }
                            echo $interest_row['interest'];
                        ?>
                        </p>
                    <!-- <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p> -->
                </div>
            </section>
            <hr class="m-0" />
            <!-- Awards-->
            <section class="resume-section" id="awards">
                <div class="resume-section-content">
                    <h2 class="mb-5">Awards & Certifications</h2>
                    <ul class="fa-ul mb-0">
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            Google Analytics Certified Developer
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            Mobile Web Specialist - Google Certification
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - University of Colorado Boulder - Emerging Tech Competition 2009
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            2
                            <sup>nd</sup>
                            Place - University of Colorado Boulder - Emerging Tech Competition 2008
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            1
                            <sup>st</sup>
                            Place - James Buchanan High School - Hackathon 2006
                        </li>
                        <li>
                            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                            3
                            <sup>rd</sup>
                            Place - James Buchanan High School - Hackathon 2005
                        </li>
                    </ul>
                </div>
            </section>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
