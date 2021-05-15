
<?php
/*see file prosoneimage.php   before this file */
 /*this file Processing  alot images that fetch from mysql*/
$dsn="mysql:host=localhost;dbname=the_users";  
$user="root";
$pass="";
$op= array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",);
$db=new PDO($dsn,$user,$pass);
$username = "root";
$password = "";
$database = "the_users";
$mysqli = new mysqli("localhost", $username, $password, $database);


// Create image instances
$queryy = "SELECT mail,name FROM `dataemail` ";
if ($resultt = $mysqli->query($queryy)) {
    while ($roww = $resultt->fetch_assoc()) {
        $field1email = $roww["mail"];
        $field1name = $roww["name"];

        
       



//image path

$dest = ('cbc.jpg');

//
        
        
//       this tow line if you want to add image above image
        
$src =('https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=http%3A%2F%2Fnabadh.000webhostapp.com/mycer.php?name='.$field1email.'&choe=UTF-8');
$src = imagecreatefromstring(file_get_contents($src));

//
        
        
$dest = imagecreatefromstring(file_get_contents($dest));
// Copy and merge
$white = imagecolorallocate($dest, 0, 0, 0);
        
       /* on localhost use this font */
        
$font = "C:\Windows\Fonts\arial.ttf";
        
        /*if you want to use another font use   file_get_contents */
//        $font = file_get_contents("http://db.onlinewebfonts.com/t/9ddfee5c410187b783c0be8d068a8273.woff");
//        file_put_contents("font2.woff", $font);
        
        /*when host your site use font.woff font */
        /*the font.woff file  in this repository  */
        
   if(strlen($field1name) > 1){
/*$font for localhost*/
/* replace $font with font.woff when you host your website*/
       
imagettftext($dest, 205, 0, 1200, 825, $white, $font, $field1name);
}
imagettftext($dest, 205, 0, 1200, 300, $white, $font, $field1name);

        /*the size of the image that you added in the line 25 */
imagecopymerge($dest, $src, 100, 500, 0, 0, 500,500, 100);
      
        
// rotate the image 90 degree
$imgro=imagerotate($dest , 90,0);
        

  
 header('Content-type: image/jpeg');
        imagejpeg($imgro);
      
//  save image in same folder of php file you use
       

         
//        imagejpeg($imgro,"imageone".".jpg");




            /*     if you want to save image in folder*/

//        imagejpeg($imgro,"nameoffolder/"."imageone".".jpg");
    }
}
    
    

?> 








