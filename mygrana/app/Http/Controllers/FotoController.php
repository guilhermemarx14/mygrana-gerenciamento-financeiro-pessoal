<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foto;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Image;
use App\User;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{


  public function showPictureList()
      {
          $pictures = Foto::all();
          return view('picture.list')->with('pictures', $pictures);
      }

      public function addPicture()
      {
              $user = User::find(Auth::user()->id);
          return view('picture.add')->with('user',$user);
      }

      public function savePicture(Request $request)
      {

           $file = $request['pic'];

           $imageType = 'jpg';
           $img = (string) Image::make($file)->
                                     resize( 300, null, function ( $constraint ) {
                                         $constraint->aspectRatio();
                                     })->encode( $imageType );


           $picture = new Foto;
           $picture->pic = base64_encode($img);
           $picture->type = $imageType;
           $picture->user_id = Auth::user()->id;
           $picture->save();


           return Redirect::to(route('home'));
      }

      /*
       * Extracts picture's data from DB and makes an image
       */
      public function showPicture($id)
      {
          $picture = Foto::findOrFail($id);
          $pic = Image::make($picture->pic);
          $response = Response::make($pic->encode($picture->type));

          //setting content-type
          $response->header('Content-Type', 'image/' . $picture->type);

          return $response;
      }
}
