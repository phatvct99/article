<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use App\Models\Category;
use File;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Constant;



class FileController extends Controller
{
	public function index()
	{
		$category = Category::where('dlt_flg', 0)->get();
		$viewData = [
			'category' => $category
		];
		return view('backend.file.index-download-image', $viewData);
	}

	public function downloadImage(Request $request)
	{
		$date = preg_replace("/[^A-Za-z0-9]/", '', Carbon::now()->toDateTimeString());
		$path = $request->path;
		$name = $request->name;
		$extension = pathinfo($path, PATHINFO_EXTENSION);

		$filename = Str::slug($name) . '-' . $date . '.' . $extension;
		//get file content from path
		$file = file_get_contents($path);

		switch ($request->category) {
			case '1':
				$save = file_put_contents(Constant::PATH_THUMBNAILS_ECONOMY . $filename, $file);
				break;
			case '2':
				$save = file_put_contents(Constant::PATH_THUMBNAILS_FINANCE . $filename, $file);
				break;
			case '3':
				$save = file_put_contents(Constant::PATH_THUMBNAILS_LAND . $filename, $file);
				break;
			case '4':
				$save = file_put_contents(Constant::PATH_THUMBNAILS_TECHNOLOGY . $filename, $file);
				break;
			case '5':
				$save = file_put_contents(Constant::PATH_THUMBNAILS_SOCIAL . $filename, $file);
				break;
			case '6':
				$save = file_put_contents(Constant::PATH_THUMBNAILS_CRYPTO . $filename, $file);
				break;
		}
		if ($save) {
			//transaction......

			DB::beginTransaction();
			try {
				Photo::create([
					'name' => $name,
					'path' => $filename
				]);
				DB::commit();
				return redirect('/admin/download')->with('status', 'Download image successfully!');
			} catch (Exception $e) {
				//delete if no db things........
				// Storage::delete('photos/' . $filename);
				DB::rollback();
			}
		}
	}
}
