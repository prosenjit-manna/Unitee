<?php

class ColorExtractor {
    private function RGBtoHEX($rgb) {
        $rgb = $rgb . ",";
        preg_match("/(.*?)\,(.*?)\,(.*?)\,/", $rgb, $colors);
        $r   = $colors[1];
        $g   = $colors[2];
        $b   = $colors[3];
        $hex = "#";
        $hex .= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
        return $hex;
    }
    
    
    public function getColors($img, $num, $precision, $type) {
        $allArray  = array();
        $retArray  = array();
        $maxWidth  = 200;
        $maxHeight = 200;
        $cw        = 240;
        $num       = preg_replace('/[^0-9]/', '', $num);
        $precision = preg_replace('/[^0-9]/', '', $precision);
        if ($num == "") {
            $num = 5;
        }
        if ($precision == "") {
            $precision = 5;
        }
        if ($type != "rgb" && $type != "hex"){
	        $type = "rgb";
        }
        $det = GetImageSize($img);
        if (!$det) {
            return "Enter a valid Image";
        }
        $imgWidth  = $det[0];
        $imgHeight = $det[1];
        if ($imgWidth > $maxWidth || $imgHeight > $maxHeight) {
            if ($imgWidth > $imgHeight) {
                $newWidth  = $maxWidth;
                $diff      = round($imgWidth / $maxWidth);
                $newHeight = round($imgHeight / $diff);
            } else {
                $newHeight = $maxHeight;
                $diff      = round($imgHeight / $maxHeight);
                $newWidth  = round($imgWidth / $diff);
            }
        }
        if ($det[2] == 1) {
            $origImage = imagecreatefromgif($img);
        } else if ($det[2] == 2) {
            $origImage = imagecreatefromjpeg($img);
        } else if ($det[2] == 3) {
            $origImage = imagecreatefrompng($img);
        }
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $origImage, 0, 0, 0, 0, $newWidth, $newHeight, $imgWidth, $imgHeight);
        for ($x = 0; $x < $newWidth; $x++) {
            for ($y = 0; $y < $newHeight; $y++) {
                $colors = imagecolorsforindex($newImage, imagecolorat($newImage, $x, $y));
                $r      = $colors['red'];
                $g      = $colors['green'];
                $b      = $colors['blue'];
                $a      = $colors['alpha'];
                if (!($r > $cw && $g > $cw && $b > $cw)) {
                    if (!($r == 0 && $g == 0 && $b == 0)) {
                        $rgb = $r . "," . $g . "," . $b;
                        array_push($allArray, $rgb);
                    }
                }
            }
        }
        $count = array_count_values($allArray);
        arsort($count);
        $keys = array_keys($count);
        for ($s = 0; $s < $num; $s++) {
            $first = $keys[$s] . ",";
            preg_match("/(.*?)\,(.*?)\,(.*?)\,/", $first, $colors2);
            $r  = $colors2[1];
            $g  = $colors2[2];
            $b  = $colors2[3];
            $iS = $s + 1;
            for ($i = $iS; $i < count($keys); $i++) {
                $next = $keys[$i] . ",";
                preg_match("/(.*?)\,(.*?)\,(.*?)\,/", $next, $colors2);
                $r2 = $colors2[1];
                $g2 = $colors2[2];
                $b2 = $colors2[3];
                if (abs($r2 - $r) < $precision || abs($g2 - $g) < $precision || abs($g2 - $g) < $precision) {
                    unset($keys[$i]);
                }
            }
            $keys = array_values($keys);
        }
        if ($type == "hex") {
            for ($j = 0; $j < $num; $j++) {
                $color = $this->RGBtoHEX($keys[$j]);
                array_push($retArray, $color);
            }
        } else if ($type == "rgb"){
            for ($j = 0; $j < $num; $j++) {
                array_push($retArray, $keys[$j]);
            }
        }
        return $retArray;
    }
}
