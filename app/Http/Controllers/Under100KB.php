<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Testing\FileFactory;

class Under100KB extends Controller
{
    //


    function invoke(){

        $q_s = $_SERVER['QUERY_STRING'];


        if (isset($_SERVER['QUERY_STRING'])) {
            if ($q_s = $_SERVER['QUERY_STRING']) {


                parse_str($q_s, $get_array);

                    if (isset($get_array['url'])) {


                        $image_uri = $get_array['url'];



                        if (filter_var(urldecode($image_uri), FILTER_VALIDATE_URL)) {






                            $file = $image_uri;


                            try{

                                $client = new \GuzzleHttp\Client();
                                $request = $client->get($image_uri);
                                $status_code = $request->getStatusCode();
                                }
                                catch(\Exception $e){

                                    return view('index',['image_compressor_under100kb'=>true,'error_message'=>'The image uri might be expired...']);

                                }



                            $file_headers = get_headers($file,1);



                            if ($status_code ==200) {
                                $exists = true;
                            } else {
                                $exists = false;
                            }


                            if ($exists) {

                                $mime_type =$file_headers['Content-Type'];

                                $split_mime = explode('/', $mime_type);

                                if ($split_mime[0] == 'image') {
                                    if (in_array(strtolower($split_mime[1]),IMAGE_OPTIMIZER_MIME_TYPES)) {


                                        create_dir('media/data/');


                                        $file_name =get_unqiue_file_name('media/data/',$split_mime[1]);

                                        file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                        $saved_uri = buildUrl('media/data/'.$file_name);

                                        return redirect('image-compressor/under100kb/action?url=' . $saved_uri);

                                    }

                                    else{

                                        return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                    }

                                }

                                else{
                                    return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Only upload image file...']);

                                }

                            }
                            else {

                                return view('index',['image_compressor_under100kb'=>true,'error_message'=>'The image uri might be expired...']);

                            }

                        }
                        else{



                            if(substr($image_uri, 0, 5) == 'data:'){

                                    try{
                                        $file_info = new \finfo(FILEINFO_MIME_TYPE);
                                        $mime_type = $file_info->buffer(file_get_contents($image_uri));

                                        if ($mime_type=='text/plain'){


                                            return view('index',['image_compressor_under100kb'=>true,'error_message'=>'The image uri might be expired... or broken']);


                                        }
                                    }
                                    catch(\Exception $e){

                                        return view('index',['image_compressor_under100kb'=>true,'error_message'=>'The image uri might be expired... or broken']);


                                    }




                                    $base_64_image_data=base64_decode($image_uri);





                                    if($base_64_image_data){


                                            $pos  = strpos($image_uri, ';');






                                            $mimeType = explode(':', substr($image_uri, 0, $pos))[1];





                                    $split_mime = explode('/', $mimeType);



                                    if ($split_mime[0] == 'image') {
                                        if (in_array(strtolower($split_mime[1]),array(IMAGE_OPTIMIZER_MIME_TYPES))) {





                                            create_dir('media/data/');

                                            $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                                            file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                            $saved_uri = buildUrl('media/data/'.$file_name);
                                            return redirect('image-compressor/under100kb/action?url=' . $saved_uri);

                                        }

                                        else{

                                            return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                        }

                                    }

                                    else{
                                        return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Only upload image file...']);

                                    }


                                    }


                            }

                            else{



                                return redirect('/image-compressor/under100kb');
                            }

                        }



                    }

                    else {
                        return redirect('/image-compressor/under100kb');
                    }





        }


    }


        return view('index', ['image_compressor_under100kb' => true]);


    }


    function invoke_post(){




    $choose_file = $_FILES['choose-file'];

    $image_uri = $_POST['image-uri'];



    if ( (file_exists($choose_file['tmp_name']) && getimagesize($choose_file['tmp_name'])>0 && !empty($choose_file))  || !empty(
        $image_uri
    )) {






        if (file_exists($choose_file['tmp_name']) && getimagesize($choose_file['tmp_name'])>0 && !empty($choose_file)) {




            $mime_type = $choose_file['type'];

            $split_mime = explode('/', $mime_type);

            if (in_array($split_mime[0],IMAGE_OPTIMIZER_FILE_TYPES)) {
                if (in_array($split_mime[1],IMAGE_OPTIMIZER_MIME_TYPES)) {



                    create_dir('media/data/');
                    $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                    move_uploaded_file($choose_file['tmp_name'],'media/data/'.$file_name);
                    $saved_uri = buildUrl('media/data/'.$file_name);
                    return redirect('image-compressor/under100kb/action?url=' . $saved_uri);

                }
                else{

                    return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                }

            }else{

                return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Only upload image file...']);

            }


        }

        if ($image_uri) {




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




                        if (in_array(strtolower($split_mime[0] ),IMAGE_OPTIMIZER_FILE_TYPES)) {


                            if (in_array(strtolower($split_mime[1]),IMAGE_OPTIMIZER_MIME_TYPES)) {





                                create_dir('media/data/');

                                $file_name = get_unqiue_file_name('media/data/',strtolower($split_mime[1]));

                                file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                $saved_uri = buildUrl('media/data/'.$file_name);
                                return redirect('image-compressor/under100kb/action?url=' . $saved_uri);

                            }

                            else{

                                return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                            }

                        }

                        else{
                            return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Only upload image file...']);

                        }



                    }

                    else{

                        return view('index',['image_compressor_under100kb'=>true,'error_message'=>'The image uri might be expired...']);


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



                        if (in_array($split_mime[0],IMAGE_OPTIMIZER_FILE_TYPES)) {
                            if (in_array(strtolower($split_mime[1]),IMAGE_OPTIMIZER_MIME_TYPES)) {


                                create_dir('media/data/');
                                $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);
                                file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                $saved_uri = buildUrl('media/data/'.$file_name);
                                return redirect('image-compressor/under100kb/action?url=' . $saved_uri);

                            }

                            else{

                                return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                            }

                        }

                        else{
                            return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Only upload image file...']);

                        }



                        }








                    }

                    else{
                        return redirect('/image-compressor/under100kb');
                    }
                }








            }
            else{
                return redirect('/image-compressor/under100kb');
            }



        }
    }
    else {

        return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Hey please upload image to further process...']);

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
                            catch(\GuzzleHttp\Exception\ConnectException $ce


                            ){
                                return redirect(
                                    '/image-compressor/under100kb'
                                );

                            }

                            catch(\GuzzleHttp\Exception\RequestException $re ){
                                return redirect(
                                    '/image-compressor/under100kb'
                                );
                            }


                            if($status_code==200)
                            {



                                $mime_type =$request->getHeaderLine('Content-Type');

                                $split_mime = explode('/', $mime_type);

                                if (in_array($split_mime[0],IMAGE_OPTIMIZER_FILE_TYPES)) {
                                    if (in_array(strtolower($split_mime[1]),IMAGE_OPTIMIZER_MIME_TYPES)) {


                                        $path = substr(parse_url($image_uri, PHP_URL_PATH),1);

                                        if(file_exists($path)){

                                            $imagicImage=new \imagick(realpath($path));
                                            $width=$imagicImage->getImageWidth();
                                            $height= $imagicImage->getImageHeight();
                                            $mode=$imagicImage->getImageColorspace() ;
                                            $size=readableBytes($imagicImage->getImageLength());

                                            $file_type=$split_mime[0];
                                            $file_format=$split_mime[1];





                                            $fileInfo=new \FileInfo(

                                                $width,$height,$mode,$size,$file_type
                                                ,$file_format ,null
                                            );





                                            return view('index',['image_compressor_under100kb_upload'=>true,

                                            'fileInfo'=>$fileInfo,
                                            'formUrl'=>'/image-compressor/under100kb/action?url='.$image_uri,
                                            'imageUri'=>$image_uri

                                            ]);

                                        }


                                    }

                                    else{

                                        return view('index',['image_compressor_under100kb'=>true,
                                        'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                    }

                                }

                                else{
                                    return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Only upload image file...']);

                                }





                            }else{

                                return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Unsupported uri... or malformed uri...']);

                            }


                        }
                        else{

                            return view('index',['image_compressor_under100kb'=>true,'error_message'=>'Unsupported uri... or malformed uri...']);

                        }

                    } else {
                        return redirect('/image-compressor/under100kb');
                    }





            }
        }

        return view('index',['image_compressor_under100kb_upload'=>true]);




    }


    function invoke_action_post(){



    $image_uri = $_POST['file-uri'];


    if (filter_var($image_uri, FILTER_VALIDATE_URL)) {


        $client = new \GuzzleHttp\Client();

                        $request = $client->get($image_uri);
                        $status_code = $request->getStatusCode();


                        if($status_code==200)
                        {




                            $o_size=$request->getHeaderLine('Content-Length');
                            $mime_type =$request->getHeaderLine('Content-Type');

                            $split_mime = explode('/', $mime_type);


                            $path = substr(parse_url($image_uri, PHP_URL_PATH),1);

                            if (in_array($split_mime[0],IMAGE_OPTIMIZER_FILE_TYPES) ) {

                                if (in_array($split_mime[1],IMAGE_OPTIMIZER_MIME_TYPES)) {




                                    if(file_exists($path)){

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



                                        $quality=100;




                                        create_dir('media/download/'.$document.'/');




                                        $file_name = get_unqiue_file_name('media/download/'.$document.'/','jpg');
                                        $saved_dir=$_SERVER['DOCUMENT_ROOT'] .'/media/download/'
                                        .$document.'/'.$file_name;
                                        $saved_uri = buildUrl('/media/download/'
                                        .$document.'/'.$file_name);









                                        while(true){









                                            if($quality>=1 ){


                                                $imagicImage=new \imagick(realpath($path));



                                                $imagicImage->setImageCompression(\Imagick::COMPRESSION_JPEG);



    $imagicImage->setImageCompressionQuality($quality);
    $imagicImage->setImageFormat("jpg");
    $imagicImage->stripImage();
    $imagicImage->writeImage($saved_dir);
    $imagicImage->destroy();



                                        $imagicImage=new \imagick(realpath($saved_dir));



                                        $compressed_size= $imagicImage->getImageLength();






                                        if($compressed_size <=102400  || $quality==1){


                                            break;

                                        }





                                            }

                                            $quality-=1;

                                            $imagicImage->destroy();



                                        }







                                        $imagicImage=new \imagick($saved_dir);

                                        $width=$imagicImage->getImageWidth();
                                        $height= $imagicImage->getImageHeight();
                                        $mode=$imagicImage->getImageColorspace() ;
                                        $size=readableBytes($imagicImage->getImageLength());

                                        $fileType=$split_mime[0];
                                        $fileFormat=$split_mime[1];







                                        $fileInfo=new \FileInfo(

                                            $width,$height,getColorSpace($mode),$size,$fileType,$fileFormat

                                       ,intval(getPercentageChange(


                                        intval($o_size),intval($imagicImage->getImageLength())
                                       ))
                                        );










                                        return view('index',['image_compressor_under100kb_download'=>true,

                                        'fileInfo'=>$fileInfo,
                                        'savedImageUri'=>$saved_uri

                                        ]);






                                    }





                                }

                            }

                        }





                    }


    }





}
