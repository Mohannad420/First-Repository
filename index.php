<?php
session_start();
include 'connect.php';




if(isset($_POST['submit'])){
    $setPassword = $_POST['password'];
    $Email = $_POST['email'];
    $sanEmail = filter_var($Email,FILTER_SANITIZE_EMAIL);
    $valEmail = filter_var($sanEmail,FILTER_VALIDATE_EMAIL);

    

    if(!empty($Email)){
        if($valEmail != false){
            // الاتصال والمقارنه مع الداتا بيس
            $stm = "SELECT * FROM users WHERE email = '$valEmail'";
            $q=$db->prepare($stm);
            $q->execute();
            $data=$q->fetch();

            //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
            //$password_db=$data['password'];

            $conn = mysqli_connect('localhost','root','','login');
            $check = mysqli_query($conn , $stm);
            $stm = "SELECT * FROM users WHERE email = '$valEmail'";
            
                $result = mysqli_fetch_assoc($check);

            
            if(!$data){
                $salh = 'لا يوجد حساب بهذا الاسم';

            }else{
                //$bol = password_verify($setPassword,$password_hash) ;
                $username = $result['Name'];
                $encpass = $result['Password'];
                if(md5($setPassword) != $encpass){
                    $salh = 'خطأ في كلمة المرور';
    
                }else{
                    $_SESSION['Close'] = 'ok';
                    $_SESSION['Name'] = $username ;
                    $salh = " تم تسجيل الدخول بنجاح ";
                        
                    if(isset($_POST['check'])){
                        setcookie("password", $setPassword , time() + 6000 ) ;
                        setcookie("Email", $valEmail , time() + 6000 ) ;
                    }
                }
            }
            

            
        }else{
            $salh = 'البريد غير صالح';
        }

    }else{
        $salh = " الرجاء ادخال البريد الالكتروني ";
    }
}else{
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="all.min.js">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
   <title>index</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <?php require_once 'navbar.php' ?>
 
<div class=" d-flex justify-content-center align-items-center" style="background-color:var(--nav);height:50vh;">
    <div class="text-center">
 
        <?php
        if(isset($salh)){
            $visi = "";
        }
        ?>

        <div class="alert alert-success alert-dismissible px-0" style="background-color:var(--nav);visibility:<?php if(isset($salh)){ echo 'visible';}else{echo 'hidden';} ?>;"data-bs-dismiss="alert">
            <h6  class=" text-decoration-none alert-link m-0"> <?php echo $salh; ?>  </h6> 
        </div>

        <h1 class=" text-white ">HTML CSS BOOTSTREAP</h1>
        <p class="fs-5 text-white-50 mb-5 ">Lorem ipsum dolor sit amet consectetur.</p>


        <a href="X.php" class=" btn main-btn rounded-pill px-4 py-2" ><b>PHP</b></a>
        <br>
        <br>
        <!--<form action="">
            <input type="text" placeholder="دولار امريكي" id="DR">
            
            <input type="text" placeholder="ليرة تركي" id="TL">
        </form>-->
        <br>
    </div>
</div>

<div class="container ">
    <div class="text-center my-5">
        <img src="are.png" alt="" style="width:200px;">
        <h2 class="text-uppercase">click to download</h2>
        <p class="fs-5 text-black-50">the on-the-fly color image generation to match your brand identity.</p>
        <div class=" w-25 mx-auto" style=" height: 2px ; background: var(--green);"></div>

        <div class="row my-5">
            <div class="col-md-4 px-5">
                <i class="fa-solid fa-1"style=" position: relative; z-index: 1;font-size:200px;color: rgba(0, 0, 0, 0.2);"><i class="fa-solid fa-pen" style="color: var(--green); position: absolute; z-index: 999;font-size:60px; left: 50%; bottom: 10%;"></i></i>
                
                <h5 style="color:var(--text)">bootstra psass</h5>
                <p class="text-black-50 mt-4">
                    Lorem ipsum dolor sit Aliquid eius eligendi tenetur aperiam sequi sit, officiis eum sun</p>
            </div>
            <div class="col-md-4 px-5">
                <i class="fa-solid fa-2"style=" position: relative; z-index: 1;font-size:200px;color: rgba(0, 0, 0, 0.2);"><i class="fa-solid fa-tv" style="color: var(--green); position: absolute; z-index: 999;font-size:60px; left: 50%; bottom: 10%;"></i></i>
                
                <h5 style="color:var(--text)">Fartaka Technology</h5>
                <p class="text-black-50 mt-4">
                    Lorem ipsum dolor sit Aliquid eius eligendi tenetur aperiam sequi sit, officiis eum sun</p>
            </div>            <div class="col-md-4 px-5">
                <i class="fa-solid fa-3"style=" position: relative; z-index: 1;font-size:200px;color: rgba(0, 0, 0, 0.2);"><i class="fa-solid fa-plug" style="color: var(--green); position: absolute; z-index: 999;font-size:60px; left: 50%; bottom: 10%;"></i></i>
                
                <h5 style="color:var(--text)">Elzero Web School</h5>
                <p class="text-black-50 mt-4">
                    Lorem ipsum dolor sit Aliquid eius eligendi tenetur aperiam sequi sit, officiis eum sun</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 text-center " style="background-color:var(--sec);">
    <div class="text-center my-5">
        <img src="title.png" alt="" style="width:100px;">
        <h2 class="text-uppercase mt-4">We Make This</h2>
        <p class="text-black-50">PREPARE TO BE AMAZED</p>
        <div class=" mx-auto" style=" height: 2px ; background: var(--green); width: 100px;"></div>
    </div>
    <nav class="down-nav">
            <ul class="nav justify-content-center nav-pills">
                <li class="nav-item"><a href="#" class="nav-link main-btn rounded-pill" style="background-color:var(--btn); color: var(--text);">All</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Design</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Code</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Photo</a></li>
                <li class="nav-item"><a href="#" class="nav-link">App</a></li>
            </ul>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="box bg-white mb-3" data-work="container" >
                    <img src="4.jpg" alt="..." class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <a href="#" class=" btn main-btn rounded-pill px-3 py-2" ><strong>I WANT MORE</strong></a>
</div>

<div class="container-fluid pt-5  ">
    <div class="text-center mt-5">
        <img src="title.png" alt="" style="width:100px;">
        <h2 class="mt-4">Some Stuff About Us</h2>
        <p class="text-black-50">THE GREAT TEAM</p>
        <div class=" mx-auto" style=" height: 2px ; background: var(--green); width: 100px;"></div>
        <div class=" mx-auto my-4" style="max-width: 500px;"><p class="text-black-50 text-center">Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Donec sollicitudin molestie malesuada.</p>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-md-start">
                <h4 class="mt-4">Retina Design</h4>
                <p class="text-black-50">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                    Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Donec sollicitudin molestie malesuada.</p>
                <a href="#" class=" btn main-btn rounded-pill px-3 py-2 mb-4" ><strong>ORDER ME NOW</strong></a>

            </div>
            <div class="col-md-8">
                <img class="img-fluid mt-5" src="6.png" alt="...">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 text-center " style="background-color:var(--sec);">
    <div class=" container text-center my-5">
        <h2 class=" mt-4 " style="color:var(--text);"><b>Meet The Team</b></h2>
        <p class="text-black-50">Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Donec sollicitudin molestie malesuada.</p>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="team-1.png" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3">Luke Skywalker</h3></div>
                </div>
                <div class="card-text text-black-50 p-3 bg-white m-0">“I don't understand how we got by those troops. I thought we were dead.“</div>
            </div>        
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="team-2.png" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3">Luke Skywalker</h3></div>
                </div>
                <div class="card-text text-black-50 p-3 bg-white m-0">“I don't understand how we got by those troops. I thought we were dead.“</div>
            </div>        
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="team-3.png" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3">Luke Skywalker</h3></div>
                </div>
                <div class="card-text text-black-50 p-3 bg-white m-0">“I don't understand how we got by those troops. I thought we were dead.“</div>
            </div>        
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="team-4.png" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3">Luke Skywalker</h3></div>
                </div>
                <div class="card-text text-black-50 p-3 bg-white m-0">“I don't understand how we got by those troops. I thought we were dead.“</div>
            </div>        

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-3 my-2"><img src="tech-1.png" alt="" class="img-fluid d-block mx-auto"></div>
            <div class="col-md-3 my-2"><img src="tech-2.png" alt="" class="img-fluid d-block mx-auto"></div>
            <div class="col-md-3 my-2"><img src="tech-3.png" alt="" class="img-fluid d-block mx-auto"></div>
            <div class="col-md-3 my-2"><img src="tech-4.png" alt="" class="img-fluid d-block mx-auto"></div>
        </div>
    </div>
</div>

<div class="container-fluid p-0">
    <div class=" d-flex justify-content-center align-items-center" style="background-color:var(--nav);height:45vh">
        <div class="text-center">
            <h2 class=" text-white">Start Your Project Now</h2>
            <p class=" text-white-50 mb-5 ">Leave your description and we start the engine.Don't worry,you can cancel anytime.</p>
            <a href="#" class=" btn main-btn rounded-pill px-4 py-2" ><b>START PROJECT</b></a>
        </div>
    </div>
</div>

<div class="container pt-5 text-center  ">
    <div class="text-center my-5">
        <img src="title.png" alt="" style="width:100px;">
        <h2 class="mt-4">Read Our Blog</h2>
        <p class="text-black-50">NEW STORIES</p>
        <div class=" w-25 mx-auto" style=" height: 2px ; background: var(--green);"></div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 ">
          <div class="card">
            <img src="blog-1.jpg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <span class="text-black-50">Jan 17, 2022</span>
              <h5 class="card-title">Some Awesome Blog Title Here</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card">
            <img src="blog-2.jpg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <span class="text-black-50">Jan 17, 2022</span>
              <h5 class="card-title">Some Awesome Blog Title Here</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card">
            <img src="blog-3.jpg" class="card-img-top" alt="Blog Post">
            <div class="card-body">
              <span class="text-black-50">Jan 17, 2022</span>
              <h5 class="card-title">Some Awesome Blog Title Here</h5>
            </div>
          </div>
        </div>
      </div>
    <a href="#" class=" btn main-btn rounded-pill px-4 py-2 mb-5 mt-2" ><b>Sign In</b></a>
</div>

<div class="container-fluid text-md-start " style="background:var(--text);">
    <div class="container py-5 ">
        <form action="" class="row form d-flex justify-content-center align-items-center text-center ">
            <div class="col-md-3  p-0 ">
                <label class=" form-ladel " for="#email"><h5><b>Subscribe to our Newsletter:</b></h5></label>
            </div>
            <div class="col-md-7 ">
                <input class="w-100" type="email" name="email" id="email" placeholder="Enter Email Address">
            </div>
            <div class="col-md-2 ">
                <a href="#" class=" btn rounded-pill px-3 py-2 my-5" style="color:var(--text);background: var(--nav);"><b>Subscribe</b></a>
            </div>
        </form>
    </div>
</div>

<footer class="text-center text-white" style="background:var(--nav) ;">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-linkedin"></i
        ></a>
        <!-- Github -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center  p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="" style="color:var(--text) ;" href="https://www.facebook.com/mohannad.shawakh.5">Mohannad Shawakh</a>
    </div>
    <!-- Copyright -->
  </footer>






<!--
<script>


     D = document.getElementById('DR');
     T = document.getElementById('TL');
    D.onkeyup = function(){
        T.value = (D.value * 31) + ' مصري' ;
};
    T.onkeyup = function(){
        D.value = (T.value / 31) + ' دولار' ;
}

</script>
-->





















</body>
</html>