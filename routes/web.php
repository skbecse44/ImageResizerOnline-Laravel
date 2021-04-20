<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;
use App\Models\Users;
use App\Http\Controllers\ImageOptimizer;
use App\Http\Controllers\ImageCompressor;
use App\Http\Controllers\ImageConverter;
use App\Http\Controllers\Under20KB;
use App\Http\Controllers\Under30KB;
use App\Http\Controllers\Under40KB;
use App\Http\Controllers\Under50KB;
use App\Http\Controllers\Under60KB;
use App\Http\Controllers\Under80KB;
use App\Http\Controllers\Under100KB;
use App\Http\Controllers\Under150KB;
use App\Http\Controllers\Under200KB;
use App\Http\Controllers\Under300KB;
use App\Http\Controllers\Under500KB;
use App\Http\Controllers\Under1024KB;
use App\Http\Controllers\Under2048KB;
use App\Http\Controllers\WebPtoPNG;
use App\Http\Controllers\WebPtoJPG;
use App\Http\Controllers\WebPtoGIF;
use App\Http\Controllers\PNGtoWebP;
use App\Http\Controllers\PNGtoJPG;
use App\Http\Controllers\PNGtoGIF;
use App\Http\Controllers\JPGtoWebP;
use App\Http\Controllers\JPGtoPNG;
use App\Http\Controllers\JPGtoGIF;
use App\Http\Controllers\GIFtoWebP;
use App\Http\Controllers\GIFtoPNG;
use App\Http\Controllers\GIFtoJPG;
use App\Http\Controllers\WebPMaker;
use App\Http\Controllers\JPGMaker;
use App\Http\Controllers\PNGMaker;



const IMAGE_OPTIMIZER_FILE_TYPES= array('image','application');


const IMAGE_OPTIMIZER_MIME_TYPES= array('jpg', 'jpeg', 'png', 'tiff', 'webp','bmp');



function getColorSpace(int $val){



switch($val){

    case 0:
        return 'undefined';
    case 1:
        return 'RGB';

    case 2:
        return 'GRAY';

    case 3:

        return 'TRANSPARENT';
    case 4:
        return 'OHTA';
    case 5:
        return 'LAB ';
     case 6:
        return 'XYZ ';
     case 7:
        return 'YCBCR';
     case 8:

        return 'YCC';

        case 9:
return 'YIQ';

case 10:
    return 'YPBPR';
case 11:
return 'YUV';
case 12:
    return 'CMYK';
  case 13:

    return 'SRGB';
    case 14:
        return 'HSB';
      case 15:
        return 'HSL' ;
        case 16:
            return 'HWB';

            case 17:
                return 'REC601LUMA';

                case 19:
                    return 'REC709LUMA';
                case 21:
                    return 'LOG';
                    case 22:
                        return 'CMY';

                        case 23:
                            return 'RGBA';


                        default:
                        return 'undefined';






}

}



function buildUrl($file_name): string
{
    $HOST_URL="http://localhost/";
    return $HOST_URL . $file_name;
}



function getRandStr(){
    $a = $b = '';

    for($i = 0; $i < 3; $i++){
      $a .= chr(mt_rand(65, 90)); // see the ascii table why 65 to 90.
      $b .= mt_rand(0, 9);
    }

    return $a . $b;

}



function getPercentageChange($oldNumber, $newNumber){
    $decreaseValue = $newNumber- $oldNumber ;

    return ($decreaseValue / $oldNumber) * 100;
}


class FileInfo
{

    public $width;
    public $height;
    public $mode;
    public $original_size;
    public $f_format;
    public $f_type;
    public $reduced_size;

    function __construct($width, $height, $mode, $original_size, $f_type, $f_format,$reduced_size)
    {
        $this->width = $width;
        $this->height = $height;
        $this->mode=$mode;
        $this->original_size=$original_size;
        $this->f_type=$f_type;
        $this->f_format=$f_format;
        $this->reduced_size=$reduced_size;

    }

}






Route::get('/image-optimizer',[

    ImageOptimizer::class,'invoke'

]);

Route::post('/image-optimizer',[

    ImageOptimizer::class,'invoke_post'

]);



Route::get('/image-optimizer/action',[

    ImageOptimizer::class,'invoke_action'

]);

Route::post('/image-optimizer/action',[

    ImageOptimizer::class,'invoke_action_post'

]);





Route::get('/image-converter',[

    ImageConverter::class,'invoke'

]);





Route::get('/image-compressor/under100kb',[

    Under100KB::class,'invoke'

]);

Route::post('/image-compressor/under100kb',[

    Under100KB::class,'invoke_post'

]);



Route::get('/image-compressor/under100kb/action',[

    Under100KB::class,'invoke_action'

]);

Route::post('/image-compressor/under100kb/action',[

    Under100KB::class,'invoke_action_post'

]);




Route::get('/image-compressor/under1mb',[

    Under1024KB::class,'invoke'

]);

Route::post('/image-compressor/under1mb',[

    Under1024KB::class,'invoke_post'

]);



Route::get('/image-compressor/under1mb/action',[

    Under1024KB::class,'invoke_action'

]);

Route::post('/image-compressor/under1mb/action',[

    Under1024KB::class,'invoke_action_post'

]);





Route::get('/image-compressor/under2mb',[

    Under2048KB::class,'invoke'

]);

Route::post('/image-compressor/under2mb',[

    Under2048KB::class,'invoke_post'

]);



Route::get('/image-compressor/under2mb/action',[

    Under2048KB::class,'invoke_action'

]);

Route::post('/image-compressor/under2mb/action',[

    Under2048KB::class,'invoke_action_post'

]);






Route::get('/image-compressor/under40kb',[

    Under40KB::class,'invoke'

]);

Route::post('/image-compressor/under40kb',[

    Under40KB::class,'invoke_post'

]);



Route::get('/image-compressor/under40kb/action',[

    Under40KB::class,'invoke_action'

]);

Route::post('/image-compressor/under40kb/action',[

    Under40KB::class,'invoke_action_post'

]);






Route::get('/image-compressor/under60kb',[

    Under60KB::class,'invoke'

]);

Route::post('/image-compressor/under60kb',[

    Under60KB::class,'invoke_post'

]);



Route::get('/image-compressor/under60kb/action',[

    Under60KB::class,'invoke_action'

]);

Route::post('/image-compressor/under60kb/action',[

    Under60KB::class,'invoke_action_post'

]);





Route::get('/image-compressor/under80kb',[

    Under80KB::class,'invoke'

]);

Route::post('/image-compressor/under80kb',[

    Under80KB::class,'invoke_post'

]);



Route::get('/image-compressor/under80kb/action',[

    Under80KB::class,'invoke_action'

]);

Route::post('/image-compressor/under80kb/action',[

    Under80KB::class,'invoke_action_post'

]);




Route::get('/image-compressor/under150kb',[

    Under150KB::class,'invoke'

]);

Route::post('/image-compressor/under150kb',[

    Under150KB::class,'invoke_post'

]);



Route::get('/image-compressor/under150kb/action',[

    Under150KB::class,'invoke_action'

]);

Route::post('/image-compressor/under150kb/action',[

    Under150KB::class,'invoke_action_post'

]);


Route::get('/image-compressor/under300kb',[

    Under300KB::class,'invoke'

]);

Route::post('/image-compressor/under300kb',[

    Under300KB::class,'invoke_post'

]);



Route::get('/image-compressor/under300kb/action',[

    Under300KB::class,'invoke_action'

]);

Route::post('/image-compressor/under300kb/action',[

    Under300KB::class,'invoke_action_post'

]);



Route::get('/image-compressor/under500kb',[

    Under500KB::class,'invoke'

]);

Route::post('/image-compressor/under500kb',[

    Under500KB::class,'invoke_post'

]);



Route::get('/image-compressor/under500kb/action',[

    Under500KB::class,'invoke_action'

]);

Route::post('/image-compressor/under500kb/action',[

    Under500KB::class,'invoke_action_post'

]);






Route::get('/image-compressor/under200kb',[

    Under200KB::class,'invoke'

]);

Route::post('/image-compressor/under200kb',[

    Under200KB::class,'invoke_post'

]);



Route::get('/image-compressor/under200kb/action',[

    Under200KB::class,'invoke_action'

]);

Route::post('/image-compressor/under200kb/action',[

    Under200KB::class,'invoke_action_post'

]);






Route::get('/image-compressor/under20kb',[

    Under20KB::class,'invoke'

]);

Route::post('/image-compressor/under20kb',[

    Under20KB::class,'invoke_post'

]);



Route::get('/image-compressor/under20kb/action',[

    Under20KB::class,'invoke_action'

]);

Route::post('/image-compressor/under20kb/action',[

    Under20KB::class,'invoke_action_post'

]);






Route::get('/image-compressor/under30kb',[

    Under30KB::class,'invoke'

]);

Route::post('/image-compressor/under30kb',[

    Under30KB::class,'invoke_post'

]);



Route::get('/image-compressor/under30kb/action',[

    Under30KB::class,'invoke_action'

]);

Route::post('/image-compressor/under30kb/action',[

    Under30KB::class,'invoke_action_post'

]);







Route::get('/image-compressor/under50kb',[

    Under50KB::class,'invoke'

]);

Route::post('/image-compressor/under50kb',[

    Under50KB::class,'invoke_post'

]);



Route::get('/image-compressor/under50kb/action',[

    Under50KB::class,'invoke_action'

]);

Route::post('/image-compressor/under50kb/action',[

    Under50KB::class,'invoke_action_post'

]);







Route::get('/image-compressor',[

    ImageCompressor::class,'invoke'

]);

Route::post('/image-compressor',[

    ImageCompressor::class,'invoke_post'

]);



Route::get('/image-compressor/action',[

    ImageCompressor::class,'invoke_action'

]);

Route::post('/image-compressor/action',[

    ImageCompressor::class,'invoke_action_post'

]);







Route::get('/', function () {

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

                                return view('index',['index'=>true,'error_message'=>'The image uri might be expired...']);

                            }

                        $file_headers = @get_headers($file,1);

                        if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                            $exists = false;
                        } else {
                            $exists = true;
                        }

                        if ($exists) {

                            $mime_type =$file_headers['Content-Type'];
                            $content_length =$file_headers['Content-Length'];

                            if($content_length>36700160){
                                return view('index',['index'=>true,'error_message'=>'File Size Exceeds 35MB']);
                            }



                            $split_mime = explode('/', $mime_type);

                            if ($split_mime[0] == 'image' || $split_mime[0] == 'application') {
                                if (in_array(strtolower($split_mime[1]),array('jpg', 'jpeg', 'png','x-png', 'tiff', 'webp'))) {

                                    create_dir('media/data/');

                                    $file_name = get_unqiue_file_name('media/data/',$split_mime[1]);

                                    file_put_contents('media/data/'.$file_name, file_get_contents($image_uri));
                                    $saved_uri = buildUrl('media/data/'.$file_name);
                                    return redirect('image-resizer/action?url=' . $saved_uri);

                                }

                                else{
                                    return view('index',['index'=>true,'error_message'=>'Unsupported file format... or The uploaded file format is currently not supported...']);

                                }

                            }

                            else{
                                return view('index',['index'=>true,'error_message'=>'Only upload image file...']);

                            }

                        }
                        else {

                            return view('index',['index'=>true,'error_message'=>'The image uri might be expired... or broken...']);

                        }

                    }
                    else{



                        if(substr($image_uri, 0, 5) == 'data:'){

                                try{
                                    $file_info = new finfo(FILEINFO_MIME_TYPE);
                                    $mime_type = $file_info->buffer(file_get_contents($image_uri));


                                    if(strlen(file_get_contents($image_uri))>36700160){

                                        return view('index',['index'=>true,'error_message'=>'File Size Exceeds 35MB']);


                                    }

                                    if ($mime_type=='text/plain'){


                                        return view('index',['index'=>true,'error_message'=>'The image uri might be expired... or broken']);


                                    }
                                }
                                catch(Exception $e){

                                    return view('index',['index'=>true,'error_message'=>'The image uri might be expired... or broken']);


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
                                        return redirect('image-resizer/action?url=' . $saved_uri);

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

                else {
                    return redirect('/');
                }

        }
    }

    return view('index', ['index' => true]);

});




Route::get('image-converter/webp-to-png',[

    WebPtoPNG::class,'invoke'

]);

Route::post('image-converter/webp-to-png',[

    WebPtoPNG::class,'invoke_post'

]);

Route::get('image-converter/webp-to-png/action', [
    WebPtoPNG::class,'invoke_action'

]);

Route::post('image-converter/webp-to-png/action', [

    WebPtoPNG::class,'invoke_action_post'

]);







Route::get('image-converter/png-to-jpg',[

    PNGtoJPG::class,'invoke'

]);

Route::post('image-converter/png-to-jpg',[

    PNGtoJPG::class,'invoke_post'

]);

Route::get('image-converter/png-to-jpg/action', [
    PNGtoJPG::class,'invoke_action'

]);

Route::post('image-converter/png-to-jpg/action', [

    PNGtoJPG::class,'invoke_action_post'

]);







Route::get('image-converter/png-to-webp',[

    PNGtoWebP::class,'invoke'

]);

Route::post('image-converter/png-to-webp',[

    PNGtoWebP::class,'invoke_post'

]);

Route::get('image-converter/png-to-webp/action', [
    PNGtoWebP::class,'invoke_action'

]);

Route::post('image-converter/png-to-webp/action', [

    PNGtoWebP::class,'invoke_action_post'

]);




Route::get('image-converter/jpg-to-webp',[

    JPGtoWebP::class,'invoke'

]);

Route::post('image-converter/jpg-to-webp',[

    JPGtoWebP::class,'invoke_post'

]);

Route::get('image-converter/jpg-to-webp/action', [
    JPGtoWebP::class,'invoke_action'

]);

Route::post('image-converter/jpg-to-webp/action', [

    JPGtoWebP::class,'invoke_action_post'

]);




Route::get('image-converter/jpg-to-png',[

    JPGtoPNG::class,'invoke'

]);

Route::post('image-converter/jpg-to-png',[

    JPGtoPNG::class,'invoke_post'

]);

Route::get('image-converter/jpg-to-png/action', [
    JPGtoPNG::class,'invoke_action'

]);

Route::post('image-converter/jpg-to-png/action', [

    JPGtoPNG::class,'invoke_action_post'

]);





Route::get('image-converter/jpg-to-gif',[

    JPGtoGIF::class,'invoke'

]);

Route::post('image-converter/jpg-to-gif',[

    JPGtoGIF::class,'invoke_post'

]);

Route::get('image-converter/jpg-to-gif/action', [
    JPGtoGIF::class,'invoke_action'

]);

Route::post('image-converter/jpg-to-gif/action', [

    JPGtoGIF::class,'invoke_action_post'

]);





Route::get('image-converter/png-to-gif',[

    PNGtoGIF::class,'invoke'

]);

Route::post('image-converter/png-to-gif',[

    PNGtoGIF::class,'invoke_post'

]);

Route::get('image-converter/png-to-gif/action', [
    PNGtoGIF::class,'invoke_action'

]);

Route::post('image-converter/png-to-gif/action', [

    PNGtoGIF::class,'invoke_action_post'

]);







Route::get('image-converter/webp-maker',[

    WebPMaker::class,'invoke'

]);

Route::post('image-converter/webp-maker',[

    WebPMaker::class,'invoke_post'

]);

Route::get('image-converter/webp-maker/action', [
    WebPMaker::class,'invoke_action'

]);

Route::post('image-converter/webp-maker/action', [

    WebPMaker::class,'invoke_action_post'

]);











Route::get('image-converter/png-maker',[

    PNGMaker::class,'invoke'

]);

Route::post('image-converter/png-maker',[

    PNGMaker::class,'invoke_post'

]);

Route::get('image-converter/png-maker/action', [
    PNGMaker::class,'invoke_action'

]);

Route::post('image-converter/png-maker/action', [

    PNGMaker::class,'invoke_action_post'

]);








Route::get('image-converter/jpg-maker',[

    JPGMaker::class,'invoke'

]);

Route::post('image-converter/jpg-maker',[

    JPGMaker::class,'invoke_post'

]);

Route::get('image-converter/jpg-maker/action', [
    JPGMaker::class,'invoke_action'

]);

Route::post('image-converter/jpg-maker/action', [

    JPGMaker::class,'invoke_action_post'

]);
















Route::get('image-converter/webp-to-jpg',[

    WebPtoJPG::class,'invoke'

]);

Route::post('image-converter/webp-to-jpg',[

    WebPtoJPG::class,'invoke_post'

]);




Route::get('image-converter/webp-to-jpg/action', [
    WebPtoJPG::class,'invoke_action'

]);






Route::post('image-converter/webp-to-jpg/action', [

    WebPtoJPG::class,'invoke_action_post'

]);





Route::get('image-converter/webp-to-gif',[

    WebPtoGIF::class,'invoke'

]);

Route::post('image-converter/webp-to-gif',[

    WebPtoGIF::class,'invoke_post'

]);




Route::get('image-converter/webp-to-gif/action', [
    WebPtoGIF::class,'invoke_action'

]);






Route::post('image-converter/webp-to-gif/action', [

    WebPtoGIF::class,'invoke_action_post'

]);




function get_unqiue_file_name($file_dir,$ext){

    while (true) {
        $filename = uniqid('image-resizer-online-', true) . '.'.$ext;
        if (!file_exists($file_dir.$filename))
         return $filename;

       }

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







Route::post('/', function () {



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
                    return redirect('image-resizer/action?url=' . $saved_uri);

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
                                return redirect('image-resizer/action?url=' . $saved_uri);

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
                                return redirect('image-resizer/action?url=' . $saved_uri);

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
});






Route::get('image-resizer/action', function () {



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
                        catch(GuzzleHttp\Exception\ConnectException $ce


                        ){

                            return redirect(
                                '/'
                            );


                        }

                        catch(GuzzleHttp\Exception\RequestException $re ){
                            return redirect(
                                '/'
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

                                        $imagicImage=new imagick(realpath($path));
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







                                        return view('index',['image_resizer_upload'=>true,

                                        'fileInfo'=>$fileInfo,
                                        'formUrl'=>'/image-resizer/action?url='.$image_uri,
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

    return view('index',['image_resizer_upload'=>true]);





});






Route::post('image-resizer/action', function () {


    $image_uri = $_POST['file-uri'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $resize_perc = $_POST['resize-perc'];
    $method = $_POST['method'];

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


                                    if (is_numeric($method)) {
                                        if (intval($method) >= 1 && intval($method) <= 2) {
                                            if (intval($method) == 1) {

                                                if (is_numeric($width) && is_numeric($height)) {

                                                    if (intval($width) > 0 && intval($height) > 0) {
                                                        $path = substr(parse_url($image_uri, PHP_URL_PATH),1);

                                                        if(file_exists($path)){

                                                            $imagicImage=new imagick(realpath($path));


                                                            $o_width = $imagicImage->getImageWidth();
                                                            $o_height =  $imagicImage->getImageHeight();;

                                                        }
                                                        else{

                                                            return redirect('/');
                                                        }



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


                                                                    $imagicImage=new imagick(realpath($path));
                                                                    create_dir('media/download/'.$document.'/');


                                    $file_name = get_unqiue_file_name('media/download/'.$document.'/',$split_mime[1]);
                                    $saved_dir=$_SERVER['DOCUMENT_ROOT'] .'/media/download/'
                                    .$document.'/'.$file_name;
                                    $saved_uri = buildUrl('/media/download/'
                                    .$document.'/'.$file_name);






                                                                $imagicImage->resizeImage($width, $height, imagick::FILTER_LANCZOS, true);
                                                                $imagicImage->writeImage($saved_dir);



                                                                    $imagicImage=new imagick($saved_dir);

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







                                                                    return view('index',['image_resizer_download'=>true,

                                                                    'fileInfo'=>$fileInfo,
                                                                    'savedImageUri'=>$saved_uri

                                                                    ]);







                                                                }








                                                    }

                                                }



                                            } else {


                                                if (is_numeric($resize_perc)) {
                                                    if (intval($resize_perc) > 0 && intval($resize_perc) <= 100) {


                                                        $path = substr(parse_url($image_uri, PHP_URL_PATH),1);


                                                        if(file_exists($path)){

                                                            $imagicImage=new imagick(realpath($path));


                                                            $o_width = $imagicImage->getImageWidth();
                                                            $o_height =  $imagicImage->getImageHeight();;

                                                        }
                                                        else{

                                                            return redirect('/');
                                                        }


                                                        $r_p = intval($resize_perc);
                                                        $r_width = $o_width * ($r_p / 100);
                                                        $r_height = $o_height * ($r_p / 100);

                                                        if ($r_width <= $o_width) {
                                                            if ($r_height <= $o_height) {


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


                                                                    $imagicImage=new imagick(realpath($path));

                                                                    create_dir('media/download/'.$document.'/');


                                                                    $file_name = get_unqiue_file_name('media/download/'.$document.'/',$split_mime[1]);
                                                                    $saved_dir=$_SERVER['DOCUMENT_ROOT'] .'/media/download/'
                                                                    .$document.'/'.$file_name;
                                                                    $saved_uri = buildUrl('/media/download/'
                                                                    .$document.'/'.$file_name);




                                                                    $imagicImage->resizeImage($width, $height, imagick::FILTER_LANCZOS, true);
                                                                                                $imagicImage->writeImage($file_name);


                                                                     $imagicImage=new imagick(realpath($path));

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







                                                                    return view('index',['image_resizer_upload'=>true,

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

                        }





                    }


});





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







