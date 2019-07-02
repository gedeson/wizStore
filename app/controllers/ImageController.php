<?php

use App\ImageModel;
use Illuminate\Routing\Controller;
use Image;
use Illuminate\Http\Request;

class ImageController extends Controller {
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$image = ImageModel::latest()->first();
		return view('createimage', compact('image'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
		]);
		
		$originalImage= $request->file('filename');
		$thumbnailImage = Image::make($originalImage);
		$thumbnailPath = public_path().'/thumbnail/';
		$originalPath = public_path().'/images/';
		$thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
		$thumbnailImage->resize(150,150);
		$thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
		
		$imagemodel= new ImageModel();
		$imagemodel->filename=time().$originalImage->getClientOriginalName();
		$imagemodel->save();
		
		return back()->with('success', 'Your images has been successfully Upload');
		
	}
}
