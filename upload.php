<?php
session_start();
if(isset($_FILES['file']['name'])){
$amtdadlar = ['mp3','mp4','exe','txt','gif','jpeg','jpg','pdf'];

$amtdad1 = $_FILES['file']['name'];
$amtdad2 = explode('.',$amtdad1);
$amtdad3 = end($amtdad2);
$amtdad4 = strtolower($amtdad3);

}





if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_FILES['file']['error'] == '0'){

        if($_FILES['file']['size'] > 3000000){
            $omsg = '  الملف كبير جدآ <br> <i class="fa-solid fa-triangle-exclamation pt-2 "></i> ';

        }elseif(!in_array($amtdad4 , $amtdadlar)){
            $zmsg = ' الملف غير مصرح به <br> <i class="fa-solid fa-triangle-exclamation pt-2 "></i> ';

        }else{
            $msg = 'تمت التحميل بنجاح <br> <i class="fa-regular fa-circle-check pt-2"></i> ' ;
            move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $_FILES['file']['name'] );
    
        }

    }else{
        $xmsg = ' اختر ملف من فضلك <br> <i class="fa-solid fa-triangle-exclamation pt-2 "></i> ';
    }
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
<body style="height: 100vh;background-color:var(--sec);;">
    <?php require_once "navbar.php" ?>
    <img src="<?php
    if(isset($_FILES['file']['name'])){
        echo 'uploads/' . $_FILES['file']['name'];
    }
    ?>" class="img-fulid " style="height: 90vh; width:100%;  opacity: 0.3; z-index: 1;   position: absolute;
    " alt="">
    <div class=" container d-flex justify-content-center align-items-center py-4 my-4 "  style="position: relative;z-index: 99"
 >
        <form enctype="multipart/form-data" method="POST" >



            <div class="mb-4 mt-2  "  >

                <label onclick="demoDisplay()" for="isn" id="uplo" class="form-label mx-5 px-5 py-5 d-flex justify-content-center ">
                    <h1 class=" text-center " style="color:var(--text);">
                    <i class="fa-solid fa-cloud-arrow-up "style="color:var(--text);font-size:80px"></i>                                            <br>    
                        UpLoad File 
                        <br>
                        </h1>                
                </label>
                <input class="form-control mt-5" type="file" id="isn" name="file" style="<?php
                if(isset($amtdad1)){
                    echo 'display:none;';
                }
                ?>" >
            </div>
            <h2 class="text-success text-center"><?php 
                        if(isset($msg)){
                            echo $msg ;
                        }
                        ?>

                        </h2>
                        <h2 class="text-warning text-center"><?php 
                        if(isset($omsg)){
                            echo $omsg ;
                        }
                        ?>
                        </h2>

                        <h2 class="text-warning text-center"><?php 
                        if(isset($xmsg)){
                            echo $xmsg ;
                        }
                        ?>
                        </h2>
                        
                        <h2 class="text-danger text-center "><?php 
                        if(isset($zmsg)){
                            echo $zmsg ;
                        }
                        ?>
                        </h2>
            <div class="d-grid">
                <button onclick="demoDisplayy()" class="btn btn-primary main-btn btn-lg fs-5 fw-bold my-4" name="submit" type="submit">Send File</button>
            </div>
        </form>
    </div>

</body>

<script>
function demoDisplay() {
  document.getElementById("isn").style.display = "block";
};

</script>
</html>