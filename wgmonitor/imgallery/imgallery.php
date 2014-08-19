<?php

class ImgGallery {

  //=======================================//
  //==========> Class Variables <==========//
  //=======================================//
  private $thumbsize;	//Size of the image thumbnail
  private $maxsize;		//Size of the image
  private $folderpath;	//Path to the folder where the images are stored
  private $elements;


//=======================================================================================//
//================================= Core Methods ========================================//
//=======================================================================================//


  //=======================================//
  //============> Constructor <============//
  //=======================================//
  public function __construct(
  	$thumbsize=96, //Change this to match your thumbnail size
  	$maxsize=640, //Change this to match your maximum image size
  	$folderpath="./lib/imgallery/pictures", //Change this to match your folder path
  	$elements=array()
  ){
    $this->thumbsize=$thumbsize;
    $this->maxsize = $maxsize;
    $this->folderpath = $folderpath;
    $this->elements = $elements;
  }


  //========================================//
  //=====> List the images to include <=====//
  //========================================//
  public function getImageArray(){
  	//Tell the class to look for images inside this folder
  	$path = $this->folderpath.'/{*.jpg,*.gif,*.png}';
  	$imgarray=glob($path,GLOB_BRACE)?glob($path,GLOB_BRACE):array();
  	return $imgarray; //Return the found images
  }

  //=========================================//
  //=====> Add an image to the gallery <=====//
  //=========================================//
  public function addImage($src){
  	$elements = $this->elements;
  	$elements[] = $src;
  	$this->elements = $elements;
  }

  //==========================================//
  //===> Add all the images from a folder <===//
  //==========================================//
  public function loadImages(){
  	$imgarray = $this->getImageArray();
  	if(!empty($imgarray)){foreach($imgarray as $img){ $this->addImage($img); }}
  }

  //=========================================//
  //==> Write the markup for the gallery <===//
  //=========================================//
  public function display($showit=1){
    $markup='
    <div id="easyimgallery">
      <ul>';
      if(!empty($this->elements)){foreach($this->elements as $img){
        $thumb=$this->getImageThumbnail($img);
        $maxsize=$this->getMaxImage($img);
        $imgname=end(explode("/",$img));
        $markup.='<li><a href="'.$maxsize.'" class="lightbox" title="'.$imgname.'">
          <img src="'.$thumb.'" alt="'.$imgname.'" />
        </a></li>';
      }}
      $markup.='
      </ul>
    </div>';
    if($showit==1){ echo $markup; }
    return $markup;
}

  //=========================================//
  //====> Easy call to set everything up <===//
  //=========================================//
  public function getPublicSide(){
  	$gallery = new ImgGallery();
  	$gallery->loadImages();
  	$gallery->display();
  }

  //=========================================//
  //=====> Create the image thumbnail <======//
  //=========================================//
  public function getImageThumbnail($src){
	$size=$this->thumbsize;
	$imgSrc = $src;

	//cached img
	$cachepath = $this->folderpath.'/cache/'.$size.'x'.$size.''.str_replace("/","~",$imgSrc);
	if(file_exists($cachepath)){ return substr($cachepath,1); } //If cached, return right away
	else {	//Create the thumbnail
		//getting the image dimensions
		list($width, $height, $type, $att) = getimagesize($imgSrc);

		switch($type) {//saving the image into memory (for manipulation with GD Library)
			case 1: $myImage = imagecreatefromgif($imgSrc); break;
			case 2: $myImage = imagecreatefromjpeg($imgSrc); break;
			case 3: $myImage = imagecreatefrompng($imgSrc); break;
		}
		if($width>$size || $height>$size) {
			//setting the crop size
			if($width > $height) $biggestSide = $width;
			else $biggestSide = $height;
			//The crop size will be half that of the largest side
			$cropPercent = .5;
			$cropWidth   = $biggestSide*$cropPercent;
			$cropHeight  = $biggestSide*$cropPercent;
		}
		else { $cropWidth   = $width; $cropHeight  = $height; }

		//getting the top left coordinate
		$c1 = array("x"=>($width-$cropWidth)/2, "y"=>($height-$cropHeight)/2);

		// Creating the thumbnail
		$thumbSize = $size;
		$thumb = imagecreatetruecolor($thumbSize, $thumbSize);
		imagecopyresampled($thumb, $myImage, 0, 0, $c1['x'], $c1['y'], $thumbSize, $thumbSize, $cropWidth, $cropHeight);

		//final output
		$this->cachePicture($thumb,$cachepath);
		imagedestroy($thumb);
		return substr($cachepath,1);
	}
  }

  //=========================================//
  //======> Create the max size image <======//
  //=========================================//
  public function getMaxImage($src){
	//Get the parameters
	$filename=$src;
	$size=$this->maxsize;
	$width=$size;
	$height=$size;

	//Get the cache path
	$cachepath = $this->folderpath.'/cache/'.$size.'x'.$size.''.str_replace("/","~",$filename);

	if(file_exists($cachepath)){ return substr($cachepath,1); } //If cached, return right away
	else //Create the image
	{
		// Compute the new dimensions
		list($width_orig, $height_orig, $type, $att) = getimagesize($filename);
		if($width_orig>$size || $height_orig>$size) {
			$ratio_orig = $width_orig/$height_orig;
			if ($width/$height > $ratio_orig) { $width = $height*$ratio_orig; }
			else { $height = $width/$ratio_orig; }
		}
		else { $width=$width_orig; $height=$height_orig; }

		//Create the image into memory (for manipulation with GD Library)
		$step1 = imagecreatetruecolor($width, $height);
		switch($type) {
			case 1: $image = imagecreatefromgif($filename); break;
			case 2: $image = imagecreatefromjpeg($filename); break;
			case 3: $image = imagecreatefrompng($filename); break;
		}

		//Resize the image, save it, and return it
		imagecopyresampled($step1, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		$this->cachePicture($step1,$cachepath);
		ImageDestroy($step1);
		return substr($cachepath,1);

	}
  }

  //=============================================//
  //==> Save the dynamically created pictures <==//
  //=============================================//
  public function cachePicture($im,$cachepath){
  	if(!is_dir(dirname($cachepath))){ mkdir(dirname($cachepath)); }
	if (function_exists("imagepng")) { imagepng($im,$cachepath); }
	elseif (function_exists("imagegif")) { imagegif($im,$cachepath); }
	elseif (function_exists("imagejpeg")) { imagejpeg($im,$cachepath, 0.5); }
	elseif (function_exists("imagewbmp")) { imagewbmp($im,$cachepath);}
	else { die("Doh ! No graphical functions on this server ?"); }
	return $cachepath;
  }

  //=========================================================//
  //=> Used for debugging to see what the gallery contains <=//
  //=========================================================//
  public function trace(){
  	highlight_string(print_r($this,true));
  }

}

?>
