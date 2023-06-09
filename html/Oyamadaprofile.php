<?php 
    session_start();
    require_once '../DAO/userdb.php';
    $userdao = new DAO_userdb();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/OyamadaBar.css">
    <link rel="stylesheet" href="../css/Oyamadaprofile.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>


<body>

   <!-- ヘッダー -->
   <header class="mb-3 border-bottom" id="header">
    <div class="container-fluid">
        <div class="row row justify-content-between">
            <div class="d-flex align-items-center mb-0 text-dark text-decoration-none col-7 text-left px-0" style="height: 50px; padding-top: 55px;">
            <img src="../svg/a.svg">
            </div>
    
            <button class="navbar-toggler col-3 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation" style="height: 50px; box-shadow: none;">
                <!-- <svg width="50" height="50" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="60" height="60" fill="url(#pattern1)"/> -->
                    <!-- <defs>
                    <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_173_3205" transform="scale(0.00333333)"/>
                    </pattern>
                    </defs> -->
                    <img src="../svg/b.svg">
                </svg>          
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarsExample05">
            <form wtx-context="0C9FB6AB-0B58-4B25-A43A-44B7ADC851E5" class="mx-4">
              <input class="form-control text-center mb-3" type="text" placeholder="キーワードを入力" aria-label="Search" wtx-context="AA84657A-0F9B-4A04-B5FA-D24659B477FD"
              style="height: 34px;
              border: 3px solid #FFAC4A; 
              box-shadow: none;">
            </form>
        </div>
    </div>
  </header>
  
  <!-- ヘッダー↑ -->
  <div id="app">
  <div id="photo">
    <button v-on:click="openModal" class="button-style">
    <img src="../DAO/userdisplay.php" width="100">
    </button>
    </div>
    <!-- open-modalの中身が表示される -->
    <open-modal v-show="showContent" v-on:from-child="closeModal">
        <form method="POST" action="../DAO/userimagedb.php" enctype="multipart/form-data">
                <div>
                <input type="file" name="image">
                <input type="hidden" name="id" value="<?= $_SESSION['user_id']?>">
                <input type="submit" value="送信！">
            </div>
        </form>
    </open-modal>

    
</div>
    <div class="edit">
        <img src="../svg/tpyosaka.svg" alt="編集ボタン" >
</div>
    <div class="account">
        <h1 class="name"><?= $userdao->getUserName($_SESSION['user_id']); ?></h1>
    </div>
    <div>
        <p class="name_id"><?= $userdao->getUserMail($_SESSION['user_id']); ?></p>
    </div>
    <div class="rank">
        <img src="../svg/trophy.svg" alt="トロフィー" class="trophy"><p id="r_name">ブロンズ</p>
  </div>
    <div class="waku">
    <div class="frame">
    <?= $userdao->getUserBio($_SESSION['user_id']); ?>
    </div>
    </div>
    <div class="toukou">
        <button class="button">投稿一覧</button>
    </div>
</div>
    <!-- navigationBar -->
    <div class="border"></div>
 
    <div class="navigation">
     <a class="list-link" href="#" onclick="changeImage(this, 'Oyamadatime.html')">
     <i class="icon">
     <img src="../svg/time.svg" class="image-size">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage2(this, 'Oyamadaforum.html')">
     <i class="icon">
     <img src="../svg/forum.svg" class="image-size1">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage3(this, 'Oyamadatokou.html')">
     <i class="icon">
     <img src="../svg/post.svg" class="image-size">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage4(this, 'Oyamadaprofile.html')">
     <i class="icon">
     <img src="../svg/profile2.svg" class="image-size">
     </i>
     </a>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/OyamadaBar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/MaedaTest.js"></script>
</body>
</html>