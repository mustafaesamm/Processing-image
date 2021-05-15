<?php


/*this file Processing  one image*/



//image path

$dest = ('cbc.jpg');

//


//       this two line if you want to add image above image

$src =('https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=http%3A%2F%2Fnabadh.000webhostapp.com/mycer.php?name=mustafa&choe=UTF-8');
$src = imagecreatefromstring(file_get_contents($src));
//    
    
    
    
    

$dest = imagecreatefromstring(file_get_contents($dest));

// Copy and merge
$white = imagecolorallocate($dest, 0, 0, 0);
       
$font = "C:\Windows\Fonts\arial.ttf";
        
        /*if you want to use another font use   file_get_contents */
//        $font = file_get_contents("http://db.onlinewebfonts.com/t/9ddfee5c410187b783c0be8d068a8273.woff");
//        file_put_contents("font2.woff", $font);


        /*when host your site use font.woff font */
        /*the font.woff file  in this repository  */


/*$font for localhost*/
/* replace $font with font.woff when you host your website*/

imagettftext($dest, 105, 0, 1200, 825, $white, $font, "mustafa");

imagettftext($dest, 105, 0, 1200, 300, $white, $font, "esam");

imagecopymerge($dest, $src, 100, 500, 0, 0, 500,500, 100);


$imgro=imagerotate($dest , 90,0);




/*choose on of the 3 below*/

/*1 download on open page*/



header("Cache-Control: public");
header("Content-Description: FIle Transfer");
header("Content-Disposition: attachment; filename=nameofimage.jpg");
header("Content-Type: application/zip");
header("Content-Transfer-Emcoding: binary");






header('Content-type: image/jpeg');        /* dont remove this anyway */
imagejpeg($imgro);                         /* dont remove this anyway */





   /*you can save the image in two folder or three in the same time */

// 2 save image in same folder of php file you use
       

         
//        imagejpeg($imgro,"imageone".".jpg");




            /*  3   if you want to save image in folder*/

//        imagejpeg($imgro,"nameoffolder/"."imageone".".jpg");
    
    

?>
