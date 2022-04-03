<?php

namespace App\Helpers;
use GdImage;


class ImageHelper
{
  
    



    public static function thumb($source, $type='webp', $width=200, $height=100, $removeOld = true, $quality = 100)
    {
        $source = 'storage' . '/' . $source;
        $dir = pathinfo($source, PATHINFO_DIRNAME);
        $name = pathinfo($source, PATHINFO_FILENAME);
        $destination = $dir . '/' . $name . '-'. $quality . '.'. $type;
       
        $info = getimagesize($source);
        

        //crop ratio
        
       
       
       

        $isAlpha = false;
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);
        elseif ($isAlpha = $info['mime'] == 'image/webp') {
            $image = imagecreatefromwebp($source);
        } elseif ($isAlpha = $info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        } else {
            return $source;
        }
        if ($isAlpha) {
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }
        $image = imagescale($image, $width, -1);
          //crop ratio

          $width  = imagesx($image);
          $height = imagesy($image);
          $centreX = round($width / 2);
          $centreY = round($height / 2); 
          $cropWidthHalf  = round($width / 2); // could hard-code this but I'm keeping it flexible
            $cropHeightHalf = round($height / 2);
            $x1 = max(0, $centreX - $cropWidthHalf);
            $y1 = max(0, $centreY - $cropHeightHalf);

            $x2 = min($width, $centreX + $cropWidthHalf);
            $y2 = min($height, $centreY + $cropHeightHalf);
        $image = imagecrop($image, ['x' => $x1, 'y' => $y1, 'width' => $x2, 'height' => $y2]);

        switch($type){
            case 'webp': imagewebp($image, $destination, $quality); break;
            case 'jpg': imagejpeg($image, $destination, $quality); break;
            case 'png': imagepng($image, $destination, $quality); break;
          }
           

        if ($removeOld)
            unlink($source);

        return '/'.$destination;
    }
}
