<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;

use App\Models\Page;
use App\Models\PageCategory;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function browse()
     {
         $imageDirectory = public_path('images');
         $uploadedImages = [];
     
         if (is_dir($imageDirectory)) {
             $files = scandir($imageDirectory);
     
             foreach ($files as $file) {
                 if ($file !== '.' && $file !== '..') {
                     $uploadedImages[] = asset('images/' . $file);
                 }
             }
         }
     
         return response()->json(['images' => $uploadedImages]);
     }
     
     
     


    public function upload(Request $request)
    {
        try {
            if ($request->hasFile('upload')) {
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;

                $request->file('upload')->move(public_path('images'), $fileName);

                $url = asset('images/' . $fileName);
                $msg = 'Image uploaded successfully';

                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $fileName,
                    'url' => $url,
                    'error' => [
                        'message' => $msg,
                    ],
                ]);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the file upload
            return response()->json([
                'uploaded' => 0,
                'error' => [
                    'message' => 'Error uploading the image: ' . $e->getMessage(),
                ],
            ]);
        }
    }
}
