<?php
/**
 * Created By Saeed Moqadam < phpro.ir@gmail.com> http://phpro.ir
 * Date : 2014/20/6
 * Time : 12:01 AM
 */
class Image {

    static function thumb($src, $dest='' , $name ) {

        $sourceImage = $src;

        $thumbWidth = 200;

        $size = getimagesize($sourceImage);
        
        $mime = $size['mime'];
        switch ($mime) {
            case 'image/jpeg':
                $original = imagecreatefromjpeg($sourceImage);
                break;
            case 'image/png':
                $original = imagecreatefrompng($sourceImage);
                break;
            case 'image/gif':
                $original = imagecreatefromgif($sourceImage);
                break;
            default:
                break;
        }

        $width = $size[0]; //width
        $height = $size[1]; //height

        $thumbHeight = floor($height * ($thumbWidth / $width));

        $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
        
        imagecopyresampled($thumb, $original, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

        //header("Content-type: image/jpeg");
        chmod($dest ,0777 );
        imagejpeg($thumb,$dest.'/'.$name);
    }

}