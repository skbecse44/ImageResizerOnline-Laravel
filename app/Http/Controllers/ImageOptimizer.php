<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Users;


function get_unqiue_file_name($file_dir,$ext){

    while (true) {
        $filename = uniqid('image-optimizer-online-', true) . '.'.$ext;
        if (!file_exists($file_dir.$filename))
         return $filename;

       }

}



function getRandStr(){
    $a = $b = '';

    for($i = 0; $i < 3; $i++){
      $a .= chr(mt_rand(65, 90)); // see the ascii table why 65 to 90.
      $b .= mt_rand(0, 9);
    }

    return $a . $b;

}



function create_dir($dir){
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
        }

}




function readableBytes($bytes) {
    $i = floor(log($bytes) / log(1024));
    $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

    return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
}




// Function to get the client IP address
function getClientIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}






class FileInfo
{

    public $width;
    public $height;
    public $mode;
    public $original_size;
    public $f_type;
    public $f_format;

    public $reduced_size;


    function __construct($width, $height, $mode, $original_size, $f_type, $f_format,$reduced_size)
    {

        $this->width = $width;
        $this->height = $height;
        $this->mode=$mode;
        $this->original_size=$original_size;
        $this->f_type=$f_type;

        $this->$f_format=$f_format;
        $this->$reduced_size=$reduced_size;


    }

}







class ImageOptimizer extends Controller
{
    //


    function invoke(){



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
                                $statusCode = $request->getStatusCode();
                                }
                                catch(\Exception $e){

                                    return view('index',['image_optimizer'=>true,'error_message'=>'The image uri might be expired...']);

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

                                        file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                        $saved_uri = buildUrl('media/data/'.$file_name);

                                        return redirect('image-optimizer/action?url=' . $saved_uri);

                                    }

                                    else{

                                        return view('index',['image_optimizer'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                    }

                                }

                                else{
                                    return view('index',['image_optimizer'=>true,'error_message'=>'Only upload image file...']);

                                }

                            }
                            else {

                                return view('index',['image_optimizer'=>true,'error_message'=>'The image uri might be expired...']);

                            }

                        }
                        else{



                            if(substr($image_uri, 0, 5) == 'data:'){

                                    try{
                                        $file_info = new \finfo(FILEINFO_MIME_TYPE);
                                        $mime_type = $file_info->buffer(file_get_contents($image_uri));

                                        if ($mime_type=='text/plain'){


                                            return view('index',['image_optimizer'=>true,'error_message'=>'The image uri might be expired... or broken']);


                                        }
                                    }
                                    catch(\Exception $e){

                                        return view('index',['image_optimizer'=>true,'error_message'=>'The image uri might be expired... or broken']);


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
                                            return redirect('image-optimizer/action?url=' . $saved_uri);

                                        }

                                        else{

                                            return view('index',['image_optimizer'=>true,'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                        }

                                    }

                                    else{
                                        return view('index',['image_optimizer'=>true,'error_message'=>'Only upload image file...']);

                                    }


                                    }


                            }

                            else{



                                return redirect('/image-optimizer');
                            }

                        }



                    }

                    else {
                        return redirect('/image-optimizer');
                    }




            }
        }

        return view('index', ['image_optimizer' => true]);

    }


    function invoke_post(){





    $choose_file = $_FILES['choose-file'];

    $image_uri = $_POST['image-uri'];


    if ( (file_exists($choose_file['tmp_name']) && getimagesize($choose_file['tmp_name']) && !empty($choose_file))  || !empty(
        $image_uri
    )) {

        if ($choose_file) {


            $mime_type = $choose_file['type'];



            $split_mime = explode('/', $mime_type);

            if ($split_mime[0] == 'image') {
                if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {



                    create_dir('media/data/');
                    $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                    move_uploaded_file($choose_file['tmp_name'],'media/data/'.$file_name);
                    $saved_uri = buildUrl('media/data/'.$file_name);
                    return redirect('image-optimizer/action?url=' . $saved_uri);

                }

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
                    catch(Exception $e){


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
                                return redirect('image-optimizer/action?url=' . $saved_uri);

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
                            $file_info = new finfo(FILEINFO_MIME_TYPE);
                            $mime_type = $file_info->buffer(file_get_contents($image_uri));

                            if ($mime_type=='text/plain'){

                               return redirect('?url='.$image_uri);
                            }
                        }
                        catch(Exception $e){
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
                                return redirect('image-optimizer/action?url=' . $saved_uri);

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
                        return redirect('/');
                    }
                }








            }
            else{
                return redirect('/');
            }



        }
    }
    else {

        return view('index',['index'=>true,'error_message'=>'Hey please upload image to further process...']);

    }


    return view('welcome');


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
                                    '/image-optimizer'
                                );

                            }

                            catch(\GuzzleHttp\Exception\RequestException $re ){
                                return redirect(
                                    '/image-optimizer'
                                );
                            }


                            if($status_code==200)
                            {



                                $mime_type =$request->getHeaderLine('Content-Type');

                                $split_mime = explode('/', $mime_type);

                                if ($split_mime[0] == 'image') {
                                    if (in_array(strtolower($split_mime[1]),array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {


                                        $path = substr(parse_url($image_uri, PHP_URL_PATH),1);

                                        if(file_exists($path)){

                                            $imagicImage=new \imagick(realpath($path));
                                            $width=$imagicImage->getImageWidth();
                                            $height= $imagicImage->getImageHeight();
                                            $mode=$imagicImage->getImageColorspace() ;
                                            $size=readableBytes($imagicImage->getImageLength());

                                            $fileType=$split_mime[0];
                                            $fileFormat=$split_mime[1];



                                            $fileInfo=new FileInfo(

                                                $width,$height,$mode,$size,$fileType,$fileFormat

                                           ,null
                                            );







                                            return view('index',['image_optimizer_upload'=>true,

                                            'fileInfo'=>$fileInfo,
                                            'formUrl'=>'/image-optimizer/action?url='.$image_uri,
                                            'imageUri'=>$image_uri

                                            ]);






                                        }











                                    }

                                    else{

                                        return view('index',['index'=>true,
                                        'error_message'=>'Unsupported file format... or The uploaded file format currently not supported...']);

                                    }

                                }

                                else{
                                    return view('index',['index'=>true,'error_message'=>'Only upload image file...']);

                                }





                            }else{

                                return view('index',['index'=>true,'error_message'=>'Unsupported uri... or malformed uri...']);

                            }


                        }
                        else{

                            return view('index',['index'=>true,'error_message'=>'Unsupported uri... or malformed uri...']);

                        }

                    } else {
                        return redirect('/');
                    }





            }
        }

        return view('index',['image_optimizer_upload'=>true]);




    }


    function invoke_action_post(){



    $image_uri = $_POST['file-uri'];

    $resize_perc = $_POST['optimize-perc'];

    if (filter_var($image_uri, FILTER_VALIDATE_URL)) {


        $client = new \GuzzleHttp\Client();

                        $request = $client->get($image_uri);
                        $status_code = $request->getStatusCode();


                        if($status_code==200)
                        {



                            $mime_type =$request->getHeaderLine('Content-Type');

                            $split_mime = explode('/', $mime_type);



                            if ($split_mime[0] == 'image') {

                                if (in_array($split_mime[1],array('jpg', 'jpeg', 'png', 'tiff', 'webp'))) {



                                    if (is_numeric($resize_perc)) {
                                        if (intval($resize_perc) > 0 && intval($resize_perc) <= 100) {


                                            $path = substr(parse_url($image_uri, PHP_URL_PATH),1);


                                            if(file_exists($path)){

                                                $imagicImage=new \imagick(realpath($path));


                                                $o_width = $imagicImage->getImageWidth();
                                                $o_height =  $imagicImage->getImageHeight();;

                                            }
                                            else{

                                                return redirect('/');
                                            }


                                            $r_p = intval($resize_perc);

                                            if($r_p>0 && $r_p<=100)
                                            {



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


                                                $imagicImage=new \imagick(realpath($path));





                                                $imagicImage->setImageCompression(\Imagick::COMPRESSION_JPEG);
    $imagicImage->setImageCompressionQuality($r_p);
    $imagicImage->setImageFormat("jpg");
    $imagicImage->stripImage();
                                                create_dir('media/download/'.$document.'/');
                                                $file_name = get_unqiue_file_name('media/download/'.$document.'/',$split_mime[1]);
                                                $saved_dir=$_SERVER['DOCUMENT_ROOT'] .'/media/download/'
                                                .$document.'/'.$file_name;
                                                $saved_uri = buildUrl('/media/download/'
                                                .$document.'/'.$file_name);

                                                $imagicImage->writeImage($saved_dir);

                                                $imagicImage->destroy();


                                                $imagicImage=new \imagick(realpath('media/download/'.$document.'/'.$file_name));

                                                $width=$imagicImage->getImageWidth();
                                                $height= $imagicImage->getImageHeight();
                                                $mode=$imagicImage->getImageColorspace() ;
                                                $size=readableBytes($imagicImage->getImageLength());

                                                $fileType=$split_mime[0];
                                                $fileFormat=$split_mime[1];



                                                $fileInfo=new FileInfo(

                                                    $width,$height,$mode,$size,$fileType,$fileFormat

                                               ,null
                                                );







                                                return view('index',['image_optimizer_download'=>true,

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





                    }


    }


}
