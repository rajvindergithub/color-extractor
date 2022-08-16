<?php 


require 'vendor/autoload.php';

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

$palette = Palette::fromFilename('1.png');



// $palette is an iterator on colors sorted by pixel count


//foreach($palette as $color => $count) {
    // colors are represented by integers
    
  // echo Color::fromIntToHex($color);
  //    echo '<div style="height: 90px;  color: #FFF; font-size: 60px; background-color:'.Color::fromIntToHex($color).'">'.$count.'</div>';
//}

// it offers some helpers too
$topFive = $palette->getMostUsedColors(10);

//print_r($topFive);

foreach($topFive as $topColor => $counts) {
 //colors are represented by integers
 echo Color::fromIntToHex($topColor);
   
  echo '<div style="height: 90px; width: 90px; background-color:'.Color::fromIntToHex($topColor).'"></div>';
    
}


$colorCount = count($palette);

//$blackCount = $palette->getColorCount(Color::fromHexToInt('#FFFFFF'));

// an extractor is built from a palette
$extractor = new ColorExtractor($palette);

// it defines an extract method which return the most “representative” colors
$colors = $extractor->extract(5);


foreach($colors as $topColorTwo => $countsTwo) {
//colors are represented by integers
echo Color::fromIntToHex($topColorTwo);
echo '<br />';
}

?>