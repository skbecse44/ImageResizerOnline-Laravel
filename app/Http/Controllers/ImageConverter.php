<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Users;


















class ImageConverter extends Controller
{
    //


    function invoke(){


        return view('index', ['image_converter' => true]);

    }



}
