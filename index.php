<?php
    include 'includes/includes.php';
    $present_date = timestamp();

    // Checking if session is active
    if(empty($_SESSION['username'])){
        header("Location: login.php");
        exit();
      }
      
      if(!empty($_POST['item_checkbox'])){
        foreach($_POST['item_checkbox'] as $i_c){
            echo $i_c;
         } 
      }
     

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- My Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/996973c893.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700,900&display=swap" rel="stylesheet">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="images/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <title>Todo</title>
</head>
<body class="bg-light">
    <div class="container mt-3" style="max-width: 25rem;">
        <div class="main-box bg-white">
            <img src="
            <?php 
                if($present_date[3] < '16'){
                    echo 'images/morning.jpg';
                }
                elseif($present_date[3] >= '16' && $present_date[3] < '20'){
                    echo 'images/evening-1.jpg';
                }
                elseif($present_date[3] >= '20'){
                    echo 'images/night.jpg';
                }
                ?>" alt="image based on the time of the day" class="img-fluid" id="image">

            <form method="POST">
                <button class="btn logout" type="submit" name="logout"><i class="fas fa-sign-out-alt logout_icon"></i></button>
            </form>
            <form method="POST">
                <button class="btn refresh" type="submit" name="refresh"><i class="fas fa-sync-alt text-white refresh_icon"></i></button>
            </form>

            <h3 class="date text-white ml-3"><?php echo $present_date[0].', '.$present_date[1].' '.$present_date[2];?></h3>
            <div class="mt-4 px-3 overflow-auto scrollbar scrollbar-night-fade" style="height: 19rem;" >
                <form method="POST" name="checkbox_form"  id="checkbox_form"  class="checkbox_form">
                    <?php foreach($result_items as $r_i){?>
                        <div class="list mt-2 mb-2 align-items-center">
                            <div class="list_content">
                                <div class="cb_buttons align-items-center">
                                    <i class="far fa-square cb_button rounded" id="<?php echo 'cb_button_'.$r_i['id'];?>"></i>
                                    <input type="checkbox" name="item_checkbox[]" id="cb_<?php echo $r_i['id'];?>" value="<?php echo $r_i['id'];?>" onclick="checkbox_check('<?php echo $r_i['id'];?>'), add_line('<?php echo $r_i['id'];?>')">
                                </div>
                                <div id="item_<?php echo $r_i['id'];?>" class="h5 d-inline-block m-0 item_<?php echo $r_i['id'];?>" name="item_<?php echo $r_i['id'];?>">
                                    <?php echo $r_i['item']?>
                                </div>
                            </div> 
                            <button class="btn p-0" type="submit" name="delete" value="<?php echo $r_i['id'];?>"><i class="fas fa-trash delete"></i></button>
                        </div>
                        <hr class="m-0">
                    <?php }?>
                </form> 
            </div>
            <hr>
            <form method="POST" class="mx-2 pb-3 pr-2">
                <div class="d-flex align-items-center">
                    <input type="text" placeholder="Add To-Do" class="to-do px-2" name="item">
                    <button class="btn" type="submit" name="add_todo"><i class="fas fa-plus add_btn" style="font-size: 2rem;"></i></button>
                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        var checked_array = <?php echo $json_checked_array;?>;

    </script>

    <!-- My Javascript -->
    <script src="js/main.js"></script>

</body>
</html>