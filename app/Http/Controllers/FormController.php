<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function upload(Request $r){


        if($r->hasFile('image')){
            $images = $r->file('image');
            foreach ($images as $image){
                $name = time().'.'.$image->getClientOriginalName();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }

//            $this->save();

            return response()->json(['message' => 'Successfully Image Uploaded','flag'=>'true']);
        }
        return $r;
    }
}
