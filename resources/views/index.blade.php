@extends('welcome')
@section('image-optimizer')


@include('image_optimizer.image_optimizer')

@endsection

@section('image-optimizer-upload')

@include('image_optimizer.image_optimizer_upload')


@endsection

@section('image-optimizer-download')
@include('image_optimizer.image_optimizer_download')

@endsection



@section('under20kb')


@include('image_compressor.under20kb.under20kb')

@endsection

@section('under20kb-upload')

@include('image_compressor.under20kb.under20kb_upload')


@endsection

@section('under20kb-download')
@include('image_compressor.under20kb.under20kb_download')

@endsection






@section('under30kb')


@include('image_compressor.under30kb.under30kb')

@endsection

@section('under30kb-upload')

@include('image_compressor.under30kb.under30kb_upload')


@endsection

@section('under30kb-download')
@include('image_compressor.under30kb.under30kb_download')

@endsection





@section('under50kb')


@include('image_compressor.under50kb.under50kb')

@endsection

@section('under50kb-upload')

@include('image_compressor.under50kb.under50kb_upload')


@endsection

@section('under50kb-download')
@include('image_compressor.under50kb.under50kb_download')

@endsection






@section('under60kb')


@include('image_compressor.under60kb.under60kb')

@endsection

@section('under60kb-upload')

@include('image_compressor.under60kb.under60kb_upload')


@endsection

@section('under60kb-download')
@include('image_compressor.under60kb.under60kb_download')

@endsection





@section('under80kb')


@include('image_compressor.under80kb.under80kb')

@endsection

@section('under80kb-upload')

@include('image_compressor.under80kb.under80kb_upload')




@endsection

@section('under80kb-download')
@include('image_compressor.under80kb.under80kb_download')

@endsection







@section('under100kb')


@include('image_compressor.under100kb.under100kb')

@endsection

@section('under100kb-upload')

@include('image_compressor.under100kb.under100kb_upload')


@endsection

@section('under100kb-download')
@include('image_compressor.under100kb.under100kb_download')

@endsection




@section('under1024kb')


@include('image_compressor.under1024kb.under1024kb')

@endsection

@section('under1024kb-upload')

@include('image_compressor.under1024kb.under1024kb_upload')


@endsection

@section('under1024kb-download')
@include('image_compressor.under1024kb.under1024kb_download')


@endsection





@section('under2048kb')


@include('image_compressor.under2048kb.under2048kb')

@endsection

@section('under2048kb-upload')

@include('image_compressor.under2048kb.under2048kb_upload')


@endsection

@section('under2048kb-download')
@include('image_compressor.under2048kb.under2048kb_download')

@endsection


@section('under200kb')

@include('image_compressor.under200kb.under200kb')

@endsection

@section('under200kb-upload')

@include('image_compressor.under200kb.under200kb_upload')


@endsection

@section('under200kb-download')
@include('image_compressor.under200kb.under200kb_download')

@endsection




@section('under300kb')

@include('image_compressor.under300kb.under300kb')

@endsection

@section('under300kb-upload')

@include('image_compressor.under300kb.under300kb_upload')


@endsection

@section('under300kb-download')
@include('image_compressor.under300kb.under300kb_download')

@endsection




@section('under500kb')

@include('image_compressor.under500kb.under500kb')

@endsection

@section('under500kb-upload')

@include('image_compressor.under500kb.under500kb_upload')


@endsection

@section('under500kb-download')
@include('image_compressor.under500kb.under500kb_download')

@endsection





@section('under40kb')

@include('image_compressor.under40kb.under40kb')

@endsection

@section('under40kb-upload')

@include('image_compressor.under40kb.under40kb_upload')


@endsection

@section('under40kb-download')
@include('image_compressor.under40kb.under40kb_download')

@endsection



@section('under150kb')

@include('image_compressor.under150kb.under150kb')

@endsection

@section('under150kb-upload')

@include('image_compressor.under150kb.under150kb_upload')


@endsection

@section('under150kb-download')
@include('image_compressor.under150kb.under150kb_download')

@endsection











@section('image-compressor')


@include('image_compressor.image_compressor')

@endsection





@section('image-converter')


@include('image_converter.image_converter')

@endsection


@section('image-compressor-upload')

@include('image_compressor.image_compressor_upload')


@endsection

@section('image-compressor-download')
@include('image_compressor.image_compressor_download')

@endsection





@section('webp-to-png')


@include('webp.webp_to_png.webp_to_png')

@endsection

@section('webp-to-png-upload')


@include('webp.webp_to_png.webp_to_png_upload')

@endsection

@section('webp-to-png-download')
@include('webp.webp_to_png.webp_to_png_download')

@endsection




@section('webp-maker')


@include('webp.webp_maker.webp_maker')

@endsection

@section('webp-maker-upload')


@include('webp.webp_maker.webp_maker_upload')

@endsection

@section('webp-maker-download')
@include('webp.webp_maker.webp_maker_download')

@endsection






@section('png-maker')


@include('png.png_maker.png_maker')

@endsection

@section('png-maker-upload')


@include('png.png_maker.png_maker_upload')

@endsection

@section('png-maker-download')
@include('png.png_maker.png_maker_download')

@endsection





@section('jpg-maker')

@include('jpg.jpg_maker.jpg_maker')

@endsection

@section('jpg-maker-upload')


@include('jpg.jpg_maker.jpg_maker_upload')

@endsection

@section('jpg-maker-download')
@include('jpg.jpg_maker.jpg_maker_download')

@endsection









@section('webp-to-jpg')


@include('webp.webp_to_jpg.webp_to_jpg')

@endsection

@section('webp-to-jpg-upload')


@include('webp.webp_to_jpg.webp_to_jpg_upload')

@endsection

@section('webp-to-jpg-download')
@include('webp.webp_to_jpg.webp_to_jpg_download')

@endsection







@section('webp-to-gif')


@include('webp.webp_to_gif.webp_to_gif')

@endsection

@section('webp-to-gif-upload')


@include('webp.webp_to_gif.webp_to_gif_upload')

@endsection

@section('webp-to-gif-download')
@include('webp.webp_to_gif.webp_to_gif_download')

@endsection





@section('png-to-gif')


@include('png.png_to_gif.png_to_gif')

@endsection

@section('png-to-gif-upload')


@include('png.png_to_gif.png_to_gif_upload')

@endsection

@section('png-to-gif-download')
@include('png.png_to_gif.png_to_gif_download')

@endsection




@section('png-to-jpg')


@include('png.png_to_jpg.png_to_jpg')

@endsection

@section('png-to-jpg-upload')


@include('png.png_to_jpg.png_to_jpg_upload')

@endsection

@section('png-to-jpg-download')
@include('png.png_to_jpg.png_to_jpg_download')

@endsection




@section('png-to-webp')


@include('png.png_to_webp.png_to_webp')

@endsection

@section('png-to-webp-upload')


@include('png.png_to_webp.png_to_webp_upload')

@endsection

@section('png-to-webp-download')
@include('png.png_to_webp.png_to_webp_download')

@endsection







@section('jpg-to-webp')


@include('jpg.jpg_to_webp.jpg_to_webp')

@endsection

@section('jpg-to-webp-upload')


@include('jpg.jpg_to_webp.jpg_to_webp_upload')

@endsection

@section('jpg-to-webp-download')
@include('jpg.jpg_to_webp.jpg_to_webp_download')

@endsection




@section('jpg-to-png')


@include('jpg.jpg_to_png.jpg_to_png')

@endsection

@section('jpg-to-png-upload')


@include('jpg.jpg_to_png.jpg_to_png_upload')

@endsection

@section('jpg-to-png-download')
@include('jpg.jpg_to_png.jpg_to_png_download')

@endsection







@section('jpg-to-gif')


@include('jpg.jpg_to_gif.jpg_to_gif')

@endsection

@section('jpg-to-gif-upload')


@include('jpg.jpg_to_gif.jpg_to_gif_upload')

@endsection

@section('jpg-to-gif-download')
@include('jpg.jpg_to_gif.jpg_to_gif_download')

@endsection


@section('image-resizer')

    <h1 style="font-weight: 400">Resize Image Online</h1>

    <div style="margin-top: 24px;
background-color: #EFEFEE;
padding:16px 8px;

">

        <div style="padding:8px;
background-color: white;
">


            <div class="tab">
                <button class="tablinks"

                        onclick="openCity(event, 'one')">Upload File</button>
                <button class="tablinks" onclick="openCity(event, 'two')">Paste Image URI or URL</button>
            </div>



            <form method="POST" action="/"

                  enctype="multipart/form-data"
            >

            @csrf <!-- {{ csrf_field() }} -->
                <div id="one"

                     style="display: block;
padding-top: 16px;
"
                     class="tabcontent">
                    <h3

                    >Choose Image</h3>

                    <p>Upload image from your computer:
                    </p>

                    <div style="padding:8px 0">

                        <input type="file" name="choose-file">
                    </div>


                </div>

                <div id="two" class="tabcontent">

                    <h3

                    >Choose Image</h3>

                    <p>Paste Image URI or URL


                    </p>

                    <div style="padding:8px 0">

                        <input type="url"
                               name="image-uri"

                               style="padding: 8px"

                               placeholder="https:// or data:"
                        >
                    </div>



                </div>


                <div style="padding:8px">

                    <input
                        type="submit"
                        style="

padding: 8px 16px;
background-color: rebeccapurple;
outline: none;
border: none;
color: white;
border-radius: 6px;
cursor: pointer;
"
                        value="Submit"

                    >
                </div>
                <div class="info-wrapper"
                     style="padding:8px"
                >
                    <p>Supported image types: JPEG, PNG , WEBP, GIF and All other image formats.
                    </p>

                    <p>
                        Max file size: 35MB
                    </p>
                </div>


            </form>









            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
            </script>


        </div>
    </div>

@endsection

@section('image-resizer-upload')

    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: purple;
            color: #fff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }


        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }


        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid purple;
        }

        .resizer-option-disable {
            margin:8px 0;

            padding:8px 16px;
            border:1px solid silver;
            pointer-events: none;
            opacity:0.4;
        }


        .resizer-option-enable{
            margin:8px 0;

            padding:8px 16px;
            border:1px solid silver;
            opacity:1;
        }


    </style>








    <div style="padding: 16px 32px;
				margin:8px 0;
				background-color:white;
				">


        <h1

        style="padding:8px 0"
        >Resize Image Online</h1>

        <div style="text-align: center">




            @if (isset($imageUri))

            <img

style='
max-width:100%;

'
alt="
"
src="{{$imageUri}}"/>


            @endif


        </div>


        <div>



            <table class="styled-table">
                <thead >
                    <tr >
                        <th style="color: white;">File Attributes</th>
                        <th style="color: white;">Info</th>
                    </tr>
                </thead>
                <tbody>



                    @if (isset($fileInfo))

                    @if ($fileInfo)






                @if ($fileInfo->width)

                <tr>
                    <td>Height</td>
                    <td>{{$fileInfo->width}} PX</td>
                </tr>
                @endif

                @if ($fileInfo->height)

                <tr>
                    <td>Height</td>
                    <td>{{$fileInfo->height}} PX</td>
                </tr>
                @endif

                @if ($fileInfo->original_size)
                <tr>
                    <td>Original Size</td>
                    <td>{{$fileInfo->original_size}}</td>
                </tr>
                @endif



                @if ($fileInfo->f_type)
                <tr>
                    <td>Type</td>
                    <td>{{$fileInfo->f_type}}</td>
                </tr>
                @endif


                @if ($fileInfo->f_format)

                <tr>
                    <td>Format</td>
                    <td>{{$fileInfo->f_format}}</td>
                </tr>

                @endif


                @if ($fileInfo->mode)
                <tr>
                    <td>Mode</td>
                    <td>{{$fileInfo->mode}}</td>
                </tr>
                @endif




                @endif



                @endif


                </tbody>
            </table>


        </div>



        <script>




function showVal(val){


document.getElementById('update-perc')
.innerHTML=val;
}




            // Shorthand for $( document ).ready()
            $(function() {




                $( "#set-w-h" ).on( "click", function( event ) {

                    var className = $('#option-one-wrapper').attr('class');

                    if (className==='resizer-option-disable'){
                        $('#method').attr('value',1)

                        $('#option-one-wrapper input').prop('required',true)
                        $('#option-two-wrapper input').prop('required',false)

                        $("#option-one-wrapper").toggleClass('resizer-option-enable resizer-option-disable');
                        $("#option-two-wrapper").toggleClass('resizer-option-disable resizer-option-enable');

                    }



                });


                $( "#range-percentage" ).on( "click", function( event ) {
                    var className = $('#option-two-wrapper').attr('class');

                    if (className==='resizer-option-disable'){
                        $('#method').attr('value',2)

                        $('#option-two-wrapper input').prop('required',true)
                        $('#option-one-wrapper input').prop('required',false)

                        $("#option-one-wrapper").toggleClass('resizer-option-disable resizer-option-enable');
                        $("#option-two-wrapper").toggleClass('resizer-option-enable resizer-option-disable');
                    }



                });

            });

        </script>


    @if (isset(
        $formUrl
    ))

    <form



    enctype="multipart/form-data" method="POST"
    action='
    {{$formUrl}}
    '>


    @csrf

  <p

  style="padding: 8px 0;

  font-size:24px;
  "
  >Choose the option to resize image</p>


  <div  id="set-w-h"
  >


      <div
          id='option-one-wrapper'


          class="resizer-option-enable"
      >

          <div
          >

              <h3>By setting width and height</h3>

              <div >

                <span style="display:block;

                margin:4px;
                ">


                   Width in PX
                </span>
                  <input type="number"



                         required
                         style="padding:8px;
margin:4px;
"

                         min='1'
                         name='width'/>
              </div>
          </div>


          <div>
              <div>

                <span style="display:block;

                margin:4px;
                ">


                   Height in PX
                </span>
                  <input type="number"
                         min='1'


                         required
                         style="padding:8px;
margin:4px;
"
                         name='height'/>

              </div>
          </div>

      </div>

  </div>

  <div id="range-percentage" >


      <div id ="option-two-wrapper" class="resizer-option-disable">

          <h3>By Percentage </h3>
          <input
              name='resize-perc'

              style='width:inherit'
              type="range"
              max="100"
              min="1"
              value='30'


              oninput="showVal(this.value)" onchange="showVal(this.value)"

          />

          <p>

              Currently the percentage is <span id="update-perc">

                </span>
          </p>



      </div>

  </div>
  <div>




      <div>
          <input
              id='method'
              name='method'
              type='number'
              min='1'
              max='2'
              value='1'
              required
              style='position:absolute;
visibility:hidden;
'
          />


      </div>

      <input
          name='file-uri'
          type='url'
          required
          style='position:absolute;
visibility:hidden;
'
value="{{$imageUri}}"
      />


  </div>
  <button style="padding: 8px 16px;
background-color: purple;
color: white;
font-weight: bold;
border: none;
border-radius:4px;
outline:none;

cursor:pointer;
"

type="submit"
>
      Resize Image !!!
  </button>

</form>
    @endif

    </div>
    </div>

    </div>

@endsection






@section('image-resizer-download')

<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: purple;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }


    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }


    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid purple;
    }




    </style>

    <div style="padding: 16px 32px;
                    margin:8px 0;
                    background-color:white;
                    border-radius:4px;
                    ">

    <div>

    <h1 style='margin-bottom:20px'>Download Resized Image</h1>



    @if (isset($savedImageUri))

    <img
    style='
    max-width:100%;
    display:block;
    height:100%;
    '

    alt=""
    src="{{$savedImageUri}}"/>
    @endif


    </div>


    <div>

    <table class="styled-table">
        <thead>
            <tr>
                <th style="color: white;">File Attributes</th>
                <th style="color: white">Info</th>
            </tr>
        </thead>
        <tbody>


            @if (isset($fileInfo))

            @if ($fileInfo)






        @if ($fileInfo->width)

        <tr>
            <td>Height</td>
            <td>{{$fileInfo->width}} PX</td>
        </tr>
        @endif

        @if ($fileInfo->height)

        <tr>
            <td>Height</td>
            <td>{{$fileInfo->height}} PX</td>
        </tr>
        @endif

        @if ($fileInfo->original_size)
        <tr>
            <td>Converted Image Size</td>
            <td>{{$fileInfo->original_size}}</td>
        </tr>
        @endif



        @if ($fileInfo->f_type)
        <tr>
            <td>Type</td>
            <td>{{$fileInfo->f_type}}</td>
        </tr>
        @endif


        @if ($fileInfo->f_format)

        <tr>
            <td>Format</td>
            <td>{{$fileInfo->f_format}}</td>
        </tr>

        @endif


        @if ($fileInfo->mode)
        <tr>
            <td>Mode</td>
            <td>{{$fileInfo->mode}}</td>
        </tr>
        @endif




        @endif



        @endif


        </tbody>
    </table>






     </div>



    @if (isset($savedImageUri))


    <a href='{{$savedImageUri}}' download>
        <button style="padding: 8px 16px;
        background-color:purple;
        color: white;
        font-weight: bold;
        border: none;
        outline:none;
        border-radius:6px;

    cursor: pointer;
        ">
                                    Download
                                </button>
            </a>
    @endif



    </div>
    </div>










    </div>

    </div>


@endsection


