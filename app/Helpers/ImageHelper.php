<?php

namespace App\Helpers;

// use Intervention\Image\Facades\Image;
use Nette\Utils\Image;

class ImageHelper
{
    public static $imagePath = 'storage/';
    public static $storePath = 'storage/cache/';

    private static function getImagePath($filename)
    {
        $path = public_path(static::$imagePath . $filename);
        if (file_exists($path)) {
            return $path;
        }
        return false;
    }

    private static function getCachePath($filename, $width, $height, $ext)
    {
        if ($path = static::getImagePath($filename)) {
            $pathInfo = pathinfo($path);
            if ($pathInfo['extension'] == 'svg') {
                return asset(static::$storePath . $filename);
            }
            $filename = $pathInfo['filename'] . '-' . $width . '-' . $height . '.' . $ext;
        }
        $path = public_path(static::$storePath . $filename);
        if (file_exists($path)) {
            return asset(static::$storePath . $filename);
        }
        return false;
    }

    public static function thumb($filename, $width, $height, $ext='webp')
    {
        if (!$filename) {
            return null;
        }

        if ($image = static::getCachePath($filename, $width, $height, $ext)) {
            return $image;
        }

        if ($originPath = static::getImagePath($filename)) {
            $pathInfo = pathinfo($originPath);
            $name = $pathInfo['filename'] . '-' . $width . '-' .$height. '.' . $ext;
            $path = public_path(static::$storePath . $name);
            $image = Image::make($originPath)->encode($ext, 90);
            $image->resize($width, $height, function($const) {
                $const->aspectRatio();
            })->save($path);
            return asset(static::$storePath . $name);
        }

        return null;
    }
}
