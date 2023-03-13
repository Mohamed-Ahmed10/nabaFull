<?php

use Intervention\Image\ImageManagerStatic as Image;

	/**
	 * @param null $string
	 * @param string $separator
	 * @return mixed|null|string
	*/

	define('PAGINATION_COUNT', 10);
	define('PAGINATION_COUNT_FRONT', 10);

	function uploadIamgeSlider($file, $folder){
		$path = public_path();
		$destinationPath = $path . '/admin/assets/images/' . $folder . '/'; // upload path
		$photo = $file;
		$extension = $photo->getClientOriginalExtension(); // getting image extension
		$name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
		$photo->move($destinationPath, $name); // uploading file to given path
		$fileName = 'admin/assets/images/' . $folder . '/' . $name;
		return $fileName;
	}

	// function uploadIamge($file, $folder){
	// 	$photo = $file;
	// 	$extension = $photo->getClientOriginalExtension(); // getting image extension
	// 	$name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
	// 	$destinationPath = public_path('admin/assets/images/' . $folder . '/'.$name);
	// 	$path = str_replace('\\', '/', $destinationPath);
	// 	Image::make($photo)->resize(266, 126)->save($path);
	// 	$fileName = 'admin/assets/images/' . $folder . '/' . $name;
	// 	return $fileName;
	// }

	// function uploadIamges($photos, $folder){
	// 	$images = [];
	// 	foreach ($photos as $photo){
	// 		$extension = $photo->getClientOriginalExtension(); // getting image extension
	// 		$name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
	// 		$destinationPath = public_path('admin/assets/images/' . $folder . '/'.$name);
	// 		$path = str_replace('\\', '/', $destinationPath);
	// 		Image::make($photo)->resize(370, 370)->save($path);
	// 		// $img = Image::make($photo); 2
	// 		// $img->resize(370, 370); 2
	// 		// $img->save(public_path().'admin/assets/images/' . $folder . '/'.$name); 2
	// 		$images[]= 'admin/assets/images/' . $folder . '/' . $name;
	// 	}
	// 	$files = implode(",", $images);
	// 	return $files;
	// }

	function uploadIamge($file, $folder){
		$path = public_path();
		$destinationPath = $path . '/admin/assets/images/' . $folder . '/'; // upload path
        if (!\File::isDirectory($destinationPath)) {
            \File::makeDirectory($destinationPath);
        }
		$photo = $file;
		$extension = $photo->getClientOriginalExtension(); // getting image extension
		$name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
		$photo->move($destinationPath, $name); // uploading file to given path
		$fileName = 'admin/assets/images/' . $folder . '/' . $name;
		return $fileName;
	}

	function uploadIamges($photos, $folder){
		$images = [];
		foreach ($photos as $photo){
			$path = public_path();
			$destinationPath = $path . '/admin/assets/images/' . $folder . '/'; // upload path
			$extension = $photo->getClientOriginalExtension(); // getting image extension
			$name = time() . '' . rand(11111, 99999) . '.' . $extension; //renameing image
			$photo->move($destinationPath, $name); // uploading file to given path
			$images[]= 'admin/assets/images/' . $folder . '/' . $name;
		}
		$files = implode(",", $images);
		return $files;
	}

	function responseJson($status, $msg, $data = null)
	{
		$response = [
			'status' => $status,
			'msg' => $msg,
			'data' => $data
		];
		return response()->json($response);
	}
