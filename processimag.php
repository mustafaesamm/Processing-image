<html>
<head>
<link rel="stylesheet" href="nabadh22.css">
<link href="C:\Users\ALSHATHER\Desktop\hover-min.css" rel="stylesheet">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css"/>
<link href="hover-min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8" >
<script src="https://kit.fontawesome.com/9f11a05084.js" crossorigin="anonymous"></script>
</head>
</html>
<?php
/*<a class="btn btn-danger"  href="https://nabadh.000webhostapp.com/course.php?&courseid=8661&showdet">اضغط لمعرفة مكان و وقت الدورة</a>*/
?>

<?php
$dsn="mysql:host=localhost;dbname=the_users";  
$user="root";
$pass="";
$op= array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",);
$db=new PDO($dsn,$user,$pass);
$username = "root";
$password = "";
$database = "the_users";
$mysqli = new mysqli("localhost", $username, $password, $database);
// // (A) OPEN IMAGE
 //$destnew = imagecreatefromjpeg('cbc.jpg');

// (B) WRITE TEXT
// $white = imagecolorallocate($dest, 0, 0, 0);
// $txt = "mustafa esam";
// $font = "C:\Windows\Fonts\arial.ttf"; 
// imagettftext($dest, 100, 0, 1200, 850, $white, $font, $txt);

// text 2
// $white = imagecolorallocate($dest, 0, 0, 0);
// $txt = "mustafa esam 2";
// $font = "C:\Windows\Fonts\arial.ttf"; 
// imagettftext($dest, 100, 0, 500, 850, $white, $font, $txt);

// // (C) OUTPUT IMAGE
//  header('Content-type: image/jpeg');
//  header("Cache-Control: public");
// 		header("Content-Description: FIle Transfer");
// 		header("Content-Disposition: attachment; filename=ok.jpg");
// 		header("Content-Type: application/zip");
// 		header("Content-Transfer-Emcoding: binary");
// imagejpeg($dest);
// imagedestroy($dest);


// Create image instances
$queryy = "SELECT mail,name FROM `dataemail` ";
if ($resultt = $mysqli->query($queryy)) {
    while ($roww = $resultt->fetch_assoc()) {
        $field1email = $roww["mail"];
        $field1name = $roww["name"];
        // $field2name = "mustafesam";
$dest = ('cbc.jpg');
$src =('https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=http%3A%2F%2Fnabadh.000webhostapp.com/mycer.php?name='.$field1email.'&choe=UTF-8');
list($wid,$hei)= getimagesize($src);
$dest = imagecreatefromstring(file_get_contents($dest));
$src = imagecreatefromstring(file_get_contents($src));
// Copy and merge
$white = imagecolorallocate($dest, 0, 0, 0);
$font = "C:\Windows\Fonts\arial.ttf";
imagettftext($dest, 100, 0, 1200, 850, $white, $font, $field1name);
imagettftext($dest, 100, 0, 1300, 1050, $white, $font, $field1email);
imagettftext($dest, 100, 0, 1300, 1450, $white, $font, $field1name);
imagecopymerge($dest, $src, 100, 500, 0, 0, 500,500, 100);
$imgro=imagerotate($dest , 90,0);


 header('Content-type: image/jpeg');
//   header("Cache-Control: public");
// 		header("Content-Description: FIle Transfer");
// 	header("Content-Disposition: attachment; filename=ok.jpg");
// 		header("Content-Type: application/zip");
//         header("Content-Transfer-Emcoding: binary");
        imagejpeg($imgro);
        $nameofdata="دورة الاسعافات الاولية";
        if (!file_exists($nameofdata)) {
            mkdir($nameofdata, 0777);
        }
        imagejpeg($imgro, "thecer/".$field1name.".jpg");
        imagejpeg($imgro, $nameofdata."/".$field1name.".jpg");
        imagejpeg($imgro, "جميع الشهادات/".$field1name.".jpg");
        // $q="DELETE  FROM dataemail limit 1  ";
        // $db->exec($q);
    }
}
    
    

//                // size The file
// $filename = 'flower.jpg';
// $percent = 2.5;

// // Content type
// header('Content-Type: image/jpeg');

// // Get new dimensions
// list($width, $height) = getimagesize($filename);
// $new_width = $width * $percent;
// $new_height = $height * $percent;

// // Resample
// $image_p = imagecreatetruecolor($new_width, $new_height);
// $image = imagecreatefromjpeg($filename);
// imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// // Output
// imagejpeg($image_p, null, 100);
?> 








