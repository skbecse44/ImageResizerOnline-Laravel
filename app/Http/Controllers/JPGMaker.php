<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Exception;

class JPGMaker extends Controller
{
    //


    function invoke(){

        if (isset($_SERVER['QUERY_STRING'])) {
            if ($q_s = $_SERVER['QUERY_STRING']) {



                parse_str($q_s, $get_array);




                    if (isset($get_array['url'])) {


                        $image_uri = $get_array['url'];

                        if (filter_var($image_uri, FILTER_VALIDATE_URL)) {





                            $file = $image_uri;


                            try{


                                $client = new \GuzzleHttp\Client();

                                $request = $client->get($image_uri);
                                $statusCode = $request->getStatusCode();
                                }
                                catch(Exception $e){




                                    return view('index',['image_jpgmaker'=>true,'error_message'=>'The image uri might be expired...']);

                                }



                            $file_headers = get_headers($file,1);

                            if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                                $exists = false;
                            } else {
                                $exists = true;
                            }

                            if ($exists) {

                                $mime_type =$file_headers['Content-Type'];

                                $split_mime = explode('/', $mime_type);

                                if ($split_mime[0] == 'image') {
                                    if (in_array(strtolower($split_mime[1]),array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {


                                        create_dir('media/data/');


                                        $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                                        file_put_contents($file_name, file_get_contents($image_uri));
                                        $saved_uri = buildUrl($file_name);
                                        return redirect('image-converter/jpg-maker/action?url=' . $saved_uri);

                                    }

                                    else{

                                        return view('index',['image_jpgmaker'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                    }

                                }

                                else{
                                    return view('index',['image_jpgmaker'=>true,'error_message'=>'Only upload image file...']);

                                }

                            }
                            else {

                                return view('index',['image_jpgmaker'=>true,'error_message'=>'The image uri might be expired...']);

                            }

                        }
                        else{



                            if(substr($image_uri, 0, 5) == 'data:'){

                                    try{
                                        $file_info = new finfo(FILEINFO_MIME_TYPE);
                                        $mime_type = $file_info->buffer(file_get_contents($image_uri));

                                        if ($mime_type=='text/plain'){


                                            return view('index',['image_jpgmaker'=>true,'error_message'=>'The image uri might be expired... or broken']);


                                        }
                                    }
                                    catch(Exception $e){

                                        return view('index',['image_jpgmaker'=>true,'error_message'=>'The image uri might be expired... or broken']);


                                    }




                                    $base_64_image_data=base64_decode($image_uri);





                                    if($base_64_image_data){


                                            $pos  = strpos($image_uri, ';');






                                            $mimeType = explode(':', substr($image_uri, 0, $pos))[1];





                                    $split_mime = explode('/', $mimeType);



                                    if ($split_mime[0] == 'image') {
                                        if (in_array(strtolower($split_mime[1]),array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {





                                            create_dir('media/data/');

                                            $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                                            file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                            $saved_uri = buildUrl('media/data/'.$file_name);
                                            return redirect('image-converter/jpg-maker/action?url=' . $saved_uri);

                                        }

                                        else{

                                            return view('index',['image_jpgmaker'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                        }

                                    }

                                    else{
                                        return view('index',['image_jpgmaker'=>true,'error_message'=>'Only upload image file...']);

                                    }


                                    }


                            }

                            else{



                                return redirect('/image-converter/jpg-maker');
                            }

                        }



                    }

                    else {
                        return redirect('/image-converter/jpg-maker');
                    }




            }
        }

        return view('index', ['image_jpgmaker' => true]);

    }


    function invoke_post(){





    $choose_file = $_FILES['choose-files'];

    $fileCount = count($choose_file["size"]);



    $image_uri = $_POST['image-uri'];

    if((intval($fileCount>0) && $choose_file["size"][0]>0 ) || !empty(
        $image_uri
    )){

        if(intval($fileCount>0) && $choose_file["size"][0]>0){



    create_dir('media/data/zips/');



    $zip_name = get_unqiue_file_name('media/data/zips/','zip');



    $zip = new \ZipArchive;


    for ($i = 0; $i < $fileCount; $i++) {




        if ($zip->open('media/data/zips/'.$zip_name, \ZipArchive::CREATE) === TRUE)
{



    $mime_type = $choose_file['type'][$i];





    $split_mime = explode('/', $mime_type);

    if ($split_mime[0] == 'image') {
        if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {

            move_uploaded_file($choose_file["tmp_name"][$i], "media/data/".$choose_file["name"][$i]);

            $zip->addFile("media/data/".$choose_file["name"][$i],$choose_file["name"][$i]);


        }
    }



}


    }




    if(isset($zip)){
        $zip->close();

        // All files are added, so close the zip file.

    }





    $saved_uri = buildUrl('media/data/zips/'.$zip_name);

    return redirect('image-converter/jpg-maker/action?url=' . $saved_uri);



        }
       else{
           if($image_uri){


            if (substr($image_uri, 0, 5) == 'data:' || filter_var($image_uri, FILTER_VALIDATE_URL)) {




                if(filter_var($image_uri, FILTER_VALIDATE_URL)){


                    try{

                    $client = new \GuzzleHttp\Client();

                    $request = $client->get($image_uri);
                    $statusCode = $request->getStatusCode();
                    }
                    catch(\Exception $e){


                        return redirect('?url='.$image_uri);
                    }


                    if($statusCode==200)
                    {



                        $mime_type =$request->getHeaderLine('Content-Type');


                        $split_mime = explode('/', $mime_type);



                        if ($split_mime[0] == 'image') {
                            if (in_array(strtolower($split_mime[1]),array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {





                                create_dir('media/data/');

                                $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                                file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                $saved_uri = buildUrl('media/data/'.$file_name);
                                return redirect('image-converter/jpg-maker/action?url=' . $saved_uri);

                            }

                            else{

                                return view('index',['index'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                            }

                        }

                        else{
                            return view('index',['index'=>true,'error_message'=>'Only upload image file...']);

                        }



                    }

                    else{

                        return view('index',['index'=>true,'error_message'=>'The image uri might be expired...']);


                    }


                }
                else{
                    if(substr($image_uri, 0, 5) == 'data:'){








                        try{
                            $file_info = new \finfo(FILEINFO_MIME_TYPE);
                            $mime_type = $file_info->buffer(file_get_contents($image_uri));

                            if ($mime_type=='text/plain'){

                               return redirect('?url='.$image_uri);
                            }
                        }
                        catch(\Exception $e){
                            return redirect('?url='.$image_uri);

                        }




                        $base_64_image_data=base64_decode($image_uri);





                        if($base_64_image_data){


                                $pos  = strpos($image_uri, ';');






                                $mimeType = explode(':', substr($image_uri, 0, $pos))[1];





                        $split_mime = explode('/', $mimeType);



                        if ($split_mime[0] == 'image') {
                            if (in_array(strtolower($split_mime[1]),array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {





                                create_dir('media/data/');

                                $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                                file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                $saved_uri = buildUrl('media/data/'.$file_name);
                                return redirect('image-converter/jpg-maker/action?url=' . $saved_uri);

                            }

                            else{

                                return view('index',['index'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                            }

                        }

                        else{
                            return view('index',['index'=>true,'error_message'=>'Only upload image file...']);

                        }



                        }








                    }

                    else{
                        return redirect('/image-converter/jpg-maker');
                    }
                }








            }
            else{
                return redirect('/image-converter/jpg-maker');
            }




           }
           else{
            return view('index',['index'=>true,'error_message'=>'Hey please upload image to further process...']);

           }
       }

    }





    }








    function invoke_action(){

        if (isset($_SERVER['QUERY_STRING'])) {
            if ($q_s = $_SERVER['QUERY_STRING']) {

                parse_str($q_s, $get_array);

                    if (isset($get_array['url'])) {


                        $image_uri = $get_array['url'];


                        if (filter_var($image_uri, FILTER_VALIDATE_URL)) {




                            try{

                                $client = new \GuzzleHttp\Client();

                                $request = $client->get($image_uri);

                                $status_code = $request->getStatusCode();

                            }
                           catch(Exception $e){
                            return redirect(
                                'image-converter/jpg-maker?url='.$image_uri
                            );
                           }


                            if($status_code==200)
                            {



                            $mime_type =$request->getHeaderLine('Content-Type');

                            $split_mime = explode('/', $mime_type);



                            if ($split_mime[0] == 'image') {

                                if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {





                                    $path = substr(parse_url($image_uri, PHP_URL_PATH),1);


                                    $imagicImage=new \imagick(realpath($path));
                                    $width=$imagicImage->getImageWidth();
                                    $height= $imagicImage->getImageHeight();
                                    $mode=$imagicImage->getImageColorspace() ;
                                    $size=readableBytes($imagicImage->getImageLength());

                                    $fileType=$split_mime[0];
                                    $fileFormat=$split_mime[1];



                                    $file_info=new \FileInfo(

                                        $width,$height,$mode,$size,$fileType,$fileFormat

                                   ,null
                                    );







                                 return view('index',['image_jpgmaker_upload'=>true,

                                 'fileInfoItems'=>array(



                                    array( $image_uri,
                                    $file_info)


                                 ),
                                 'formUrl'=>'/image-converter/jpg-maker/action?url='.$image_uri,
                                 'imageUri'=>$image_uri,

                                 ]);





                                }
                            }else{



                                if($split_mime[0]=='application' && $split_mime[1]=='zip')


                                {




                                create_dir('media/data/extracts/');


                                $path = substr(parse_url($image_uri, PHP_URL_PATH),1);


                                $zip = new \ZipArchive();

                                $extracts=array();


                                if (file_exists($path) && $zip->open( $path)) {

                                    for ($i = 0; $i < $zip->numFiles; $i++) {
                                        if ($zip->extractTo('media/data/extracts/', array($zip->getNameIndex($i)))) {




                                            array_push($extracts,'media/data/extracts/'.$zip->getNameIndex($i));



                                        }
                                    }

                                    $zip->close();


                                 }

                                 else{
                                     return 'server zip extract error';
                                 }




                                 $file_info_items=array();


                                 for ($i = 0; $i < count($extracts); $i++) {





                                 $mime_type =mime_content_type($extracts[$i]);





                                 $split_mime = explode('/', $mime_type);

                                 if ($split_mime[0] == 'image') {
                                     if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {




                                        $imagicImage=new \imagick(realpath($extracts[$i]));
                                        $width=$imagicImage->getImageWidth();
                                        $height= $imagicImage->getImageHeight();
                                        $mode=$imagicImage->getImageColorspace() ;
                                        $size=readableBytes($imagicImage->getImageLength());

                                        $fileType=$split_mime[0];
                                        $fileFormat=$split_mime[1];



                                        $file_info=new \FileInfo(

                                            $width,$height,$mode,$size,$fileType,$fileFormat

                                       ,null
                                        );


                                        array_push($file_info_items,array(buildUrl($extracts[$i]),$file_info));



                                     }
                                 }



                                 }






                                 return view('index',['image_jpgmaker_upload'=>true,

                                 'fileInfoItems'=>$file_info_items,
                                 'formUrl'=>'/image-converter/jpg-maker/action?url='.$image_uri,
                                 'imageUri'=>$image_uri,

                                 ]);






                                }





                            }









    }
}
                    }







            }
        }

        return view('index',['image_jpgmaker_upload'=>true]);




    }





    function invoke_action_post(){



    $image_uri = $_POST['file-uri'];

    if (filter_var($image_uri, FILTER_VALIDATE_URL)) {




        try{

        $client = new \GuzzleHttp\Client();

        $request = $client->get($image_uri);
        $status_code = $request->getStatusCode();


        }catch (Exception $e){


            redirect('/image-converter/jpg-maker');

        }

                        if($status_code==200)
                        {





                            $mime_type =$request->getHeaderLine('Content-Type');

                            $split_mime = explode('/', $mime_type);







                            $ip=getClientIP();
                            $document=getRandStr();





                            $users=Users::where(
                                'ip','like',$ip
                            )->get();

                            if ($users->isEmpty()) {



                                $user=new Users();
                                $user->ip=$ip;
                                $user->document= $document;
                                $user->save();


                              }

                              else{

                                if(count($users)>=1){

                                    $ip=$users[0]['ip'];
                                    $document=$users[0]['document'];



                                }

                              }




                            if ($split_mime[0] == 'image') {

                                if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {


                                    $path = substr(parse_url($image_uri, PHP_URL_PATH),1);

                                    $ufn= get_unqiue_file_name('media/download/'.$document.'/','jpg');

             $im = new \Imagick(realpath($path));
             $im->setImageFormat('jpg');


             file_put_contents ('media/download/'.$document.'/'.$ufn, $im); // works, or:



            $split_mime=explode('/',mime_content_type('media/download/'.$document.'/'.$ufn));



             $imagicImage=new \imagick(realpath('media/download/'.$document.'/'.$ufn));
            $width=$imagicImage->getImageWidth();
            $height= $imagicImage->getImageHeight();
            $mode=$imagicImage->getImageColorspace() ;
            $size=readableBytes($imagicImage->getImageLength());

            $fileType=$split_mime[0];
            $fileFormat=$split_mime[1];



            $file_info=new \FileInfo(

                $width,$height,$mode,$size,$fileType,$fileFormat

           ,null
            );







            return view('index',['image_jpgmaker_download'=>true,

            'fileInfoItems'=>array(

                array(

                    'media/download/'.$document.'/'.$ufn,

                    $file_info

                )
            ),


            ]);




                                }
                            }





                            create_dir('media/download/extracts/');


                            $path = substr(parse_url($image_uri, PHP_URL_PATH),1);


                            $zip = new \ZipArchive();

                            $converted_files=array();
                            $extracts=array();


                            if (file_exists($path) && $zip->open( $path)) {

                                for ($i = 0; $i < $zip->numFiles; $i++) {
                                    if ($zip->extractTo('media/download/extracts/', array($zip->getNameIndex($i)))) {




                                        array_push($extracts,'media/download/extracts/'.$zip->getNameIndex($i));



                                    }
                                }

                                $zip->close();


                             }

                             else{
                                 return 'server zip extract error';
                             }







                             create_dir('media/download/'.$document.'/zips');

     create_dir('media/download/'.$document.'/zips');


     $zip_name = get_unqiue_file_name('media/download/'.$document.'/zips/','zip');



     $converted_files=array();

     $zip = new \ZipArchive;

     for ($i = 0; $i < count($extracts); $i++) {




         if ($zip->open('media/download/'.$document.'/zips/'.$zip_name, \ZipArchive::CREATE) === TRUE)
 {




     $mime_type =mime_content_type($extracts[$i]);

     $split_mime = explode('/', $mime_type);

     if ($split_mime[0] == 'image') {
         if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {








             $ufn= get_unqiue_file_name('media/download/'.$document.'/','jpg');

             $im = new \Imagick(realpath($extracts[$i]));
             $im->setImageFormat('jpg');


             file_put_contents ('media/download/'.$document.'/'.$ufn, $im); // works, or:


             $zip->addFile('media/download/'.$document.'/'.$ufn,$ufn);


             array_push($converted_files,'media/download/'.$document.'/'.$ufn);



         }


     }

    }

     }


     if(isset($zip)){

     // All files are added, so close the zip file.

     $zip->close();
     }















     $file_info_items=array();


     for ($i = 0; $i < count($converted_files); $i++) {





     $mime_type =mime_content_type($converted_files[$i]);





     $split_mime = explode('/', $mime_type);

     if ($split_mime[0] == 'image') {
         if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {




            $imagicImage=new \imagick(realpath($converted_files[$i]));
            $width=$imagicImage->getImageWidth();
            $height= $imagicImage->getImageHeight();
            $mode=$imagicImage->getImageColorspace() ;
            $size=readableBytes($imagicImage->getImageLength());

            $fileType=$split_mime[0];
            $fileFormat=$split_mime[1];



            $file_info=new \FileInfo(

                $width,$height,$mode,$size,$fileType,$fileFormat

           ,null
            );


            array_push($file_info_items,array(buildUrl($converted_files[$i]),$file_info));



         }
     }



     }






     return view('index',['image_jpgmaker_download'=>true,

     'fileInfoItems'=>$file_info_items,
     'downloadUrl'=>buildUrl(
         $zip_name
     ),

     ]);










                        }





                    }


    }


}
