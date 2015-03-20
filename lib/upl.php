<?php



class Upl{

	private $uploadedFileName;
	private $fileEnding;
	private $filetype;
	private $imageFiles = array('jpg', 'jpeg', 'gif', 'png');
	private $fileFiles = array('pdf', 'txt', 'doc', 'docx');
	public $fileInfo = array();


	/**
	 * [__construct description]
	 * @param [array] $file [$_FILE]
	 * Will set the fileextension
	 */
	public function upload($file, $uplPath, $thumbWidth = 100, $thumbHeight = 100, $onlyPicture = 0){
		$filename = strtolower($file['name']);
		$fileTmpName = $file['tmp_name'];
		$this->fileInfo['image'] = 0;
		$this->fileInfo['file'] = 0;

		$this->fileInfo['name'] = $filename;


		$this->fileEnding = pathinfo($filename, PATHINFO_EXTENSION);


		//it's an image
		if(in_array($this->fileEnding, $this->imageFiles)){
			$this->fileInfo['image'] = 1;
			
			//set path to IMG
			//$uplPath = $uplPath.'img/';
			$this->uploadFile($fileTmpName, $filename, $uplPath);
			$this->cropImage($uplPath, $filename, $this->fileEnding, $thumbWidth, $thumbHeight);
		}
		//It's a file
		else if(in_array($this->fileEnding, $this->fileFiles)){
			if($onlyPicture == 0){
				$this->fileInfo['file'] = 1;

				//set path to FILE
				$uplPath = $uplPath;
				$this->uploadFile($fileTmpName, $filename, $uplPath);
			}
			else{
				return;
			}
		}
		else{
			return;
		}

		return $this->fileInfo;

	}

	/**
	 * [uploadFile description]
	 * @param  [String] $fileTmpName [description]
	 * @param  [String] $filename    [description]
	 * @param  [String] $uplPath     [description]
	 */
	private function uploadFile($fileTmpName, $filename, $uplPath){
		move_uploaded_file($fileTmpName, $uplPath.$filename);
	}

	public function customCrop($filename, $uplPath, $fileEnding, $oriwidth, $oriheight, $cropwidth, $cropheight, $x, $y){



		$crop = imagecreatetruecolor($cropwidth, $cropheight);
		$imgFull = $uplPath.$filename;


		//file-ending with possible transperent background
		if ($fileEnding == "png" || $fileEnding == "gif") {

			if ($fileEnding == "png") {
				$image = imagecreatefrompng($imgFull);
			}
			else{
				$image = imagecreatefromgif($imgFull);
			}
			
			//settings
			imagesavealpha($image, true);
			imagealphablending($crop, false);
			imagesavealpha($crop,true);
			$transparent = imagecolorallocatealpha($crop, 255, 255, 255, 127);
			imagefilledrectangle($crop, 0, 0, $cropwidth, $cropheight, $transparent);
		}
		//its an ordinary JPG/JPEG image
		else{
			$image = imagecreatefromjpeg($imgFull);
		}


		imagecopyresampled($crop, $image, 0, 0, $x, $y, $cropwidth, $cropheight, $cropwidth, $cropheight);


		if ($fileEnding == "png" || $fileEnding == "gif") {
			imagepng($crop,$uplPath.'crop_'.$filename,9);
		}
		else{
			imagejpeg($crop,$uplPath.'crop_'.$filename,100);
		}


	}


	private function cropImage($uplPath, $filename, $fileEnding, $maxWidth, $maxHeight){


		$thumb = imagecreatetruecolor($maxWidth, $maxHeight);
		$imgFull = $uplPath.$filename;
		list($width, $height) = getimagesize($imgFull);

		//file-ending with possible transperent background
		if ($fileEnding == "png" || $fileEnding == "gif") {

			if ($fileEnding == "png") {
				$image = imagecreatefrompng($imgFull);
			}
			else{
				$image = imagecreatefromgif($imgFull);
			}
			
			//settings
			imagesavealpha($image, true);
			imagealphablending($thumb, false);
			imagesavealpha($thumb,true);
			$transparent = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
			imagefilledrectangle($thumb, 0, 0, $maxWidth, $maxHeight, $transparent);
		}
		//its an ordinary JPG/JPEG image
		else{
			$image = imagecreatefromjpeg($imgFull);
		}



		$srcRatio = $width / $height;			//Get ratio from large image.
		$destRatio = $maxWidth / $maxHeight;	//Get ratio from thumbnail


		//Calculate size and such...
		


		//width greater
		if ($srcRatio > $destRatio) {
			$newHeight = $maxHeight;
			$newWidth = $maxWidth * $srcRatio;
			$y = 0;
			//$x = (($newWidth/2) + ($maxWidth));
			$x = ($newWidth/2)/2;
		}
		//height greater
		else if ($srcRatio > $destRatio){
			$newHeight = $maxWidth / $srcRatio;
			$newWidth = $maxWidth;
			$x = 0;
			$y = ($newHeight/2)/2;
		}
		else{
			$newHeight = $maxWidth / $srcRatio;
			$newWidth = $maxWidth;
			$x = 0;
			$y = 0;
		}

		//die();


		//End of calculate...



		

		$exifData = exif_read_data($uplPath.$filename);

		if(!empty($exifData['Orientation'])) {
		    switch($exifData['Orientation']) {
		        case 8:
		            $image = imagerotate($image,90,0);
		            break;
		        case 3:
		            $image = imagerotate($image,180,0);
		            break;
		        case 6:
		            $image = imagerotate($image,-90,0);
		            break;
		    }
		}

		imagecopyresampled($thumb, $image, 0, 0, $x, $y, $newWidth, $newHeight, $width, $height);

		if ($fileEnding == "png" || $fileEnding == "gif") {
			imagepng($thumb,$uplPath.'tum_'.$filename,9);
		}
		else{
			imagejpeg($thumb,$uplPath.'tum_'.$filename,100);
		}



	}





}


?>