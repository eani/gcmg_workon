<?php 
	function helpgcmg (){
		dd('Die');

	}

	function save_file($file,$person_type,$update_image=0){
	    ini_set('memory_limit','556M');
	    // Add Product Images
	    $FileUploaded = $file;
	    if($update_image != 0){
	        $image_name = explode('.' ,$update_image )[0];
	        $filename = $image_name.'.' . $FileUploaded->getClientOriginalExtension();
	    }else{
	        $filename = date_timestamp_get(date_create()).generateRandomString(10).'.' . $FileUploaded->getClientOriginalExtension();
	        
	    }
	    $destination_path = base_path() . '/public/uploads/'.$person_type;

	    if(!File::exists($destination_path)) {
	        File::makeDirectory($destination_path, $mode = 0777, true, true);
	    }

	    $FileUploaded->move($destination_path, $filename);

	    // return ['file'=>$filename, 'original_file'=>$oldname];
	    return $filename;

	}

	function get_originalname($file){
		$FileUploaded = $file;

		$oldname = $FileUploaded->getClientOriginalName();
		
		return $oldname;
	}

	//generate random string
	function generateRandomString($length) {
		$characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ123456789123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function daysOfweek(){
	    return $days_of_week = [ 'Monday',
	                             'Tuesday',
	                             'Wednesday',
	                             'Thursday',
	                             'Friday',
	                             'Saturday',
	                             'Sunday'
	                            ];
	}

	//generate random unique code
	function getCode($model,$field){
	    do{
	        $rand = generateRandomString(8);
	    }while(!empty($model::where($field,$rand)->first()));
	    return $rand;
	}


	//generate random unique code (general)
	function getUniqueCode($model,$field,$code_lenght){
	    do{
	        $rand = generateRandomString($code_lenght);
	    }while(!empty($model::where($field,$rand)->first()));
	    return $rand;
	}

 ?>