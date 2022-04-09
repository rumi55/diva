<?php

namespace App\Helpers;
use GdImage;


class ImageHelper
{
  
    // private static function getImagePath($filename)
    // {
    //     $destination = $dir . '/' . $name . '-'. $width .'-'. $height . '.'. $type;
    //     $path = public_path(static::$imagePath . $filename);
    //     if (file_exists($path)) {
    //         return $path;
    //     }
    //     return false;
    // }



    public static function thumb($source, $type='webp', $width=200, $height=100, $removeOld = true, $quality = 100)
    {
        $source = 'storage' . '/' . $source;
        $dir = pathinfo($source, PATHINFO_DIRNAME);
        $name = pathinfo($source, PATHINFO_FILENAME);
        $destination = $dir . '/' . $name . '-'. $width .'-'. $height . '.'. $type;
        



        // if (file_exists($destination)) {
        //     return '/'.$destination;
        // }
        // else{

       
        $info = getimagesize($source);
        
        
        //crop ratio
        
        switch($info['mime']){
            case 'image/webp': $image = imagecreatefromwebp($source); break;
            case 'image/png': $image = imagecreatefrompng($source); break;
            case 'image/jpeg': $image = imagecreatefromjpeg($source); break;
        }
       
       
       
    

       

        if($width > $height){
            $w = $width;
            $h = -1;
        }
        elseif($width < $height) {
            $w = -1;
            $h = $height;
        }
        else{
            $w = $width;
            $h = $height;
        }
        
        
        $image = imagescale($image, $w, $h);

        //resize check
        
        $scalewidth = imagesx($image);
        $scaleheight = imagesy($image);

        if($scalewidth < $width){
        $w = $width;
        $h = -1;
        $image = imagescale($image, $w, $h);
        }
        elseif($scaleheight < $height){
            $w = -1;
            $h = $height;
            $image = imagescale($image, $w, $h);
        }

        //   Image crop

          $fullwidth = imagesx($image);
          $fullheight = imagesy($image);
        
        if($fullwidth/$fullheight>1){
            $x = 0;
            $y = ($fullheight-$height)/2;
        }
        elseif($width/$height<1){
            $x = ($fullwidth-$width)/2;
            $y = 0;
        }
        elseif($fullwidth/$fullheight===1){
            $x = 0;
            $y = 0;
        }
        else{
            $x = 0;
            $y = $height/2;
        }
         
          $image = imagecrop($image, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
      


    

          
         


        switch($type){
            case 'webp': imagewebp($image, $destination, $quality); break;
            case 'jpg': imagejpeg($image, $destination, $quality); break;
            case 'png': 
                imageAlphaBlending($image, true);
                imageSaveAlpha($image, true);
                header("Content-type: image/png");
                imagepng($image, $destination, $quality); break;
          }
         

        if ($removeOld)
            unlink($source);

        return '/'.$destination;
    }
}
    
    
// }
