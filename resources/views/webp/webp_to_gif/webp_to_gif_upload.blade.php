<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
width:100%;
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



</style>

<div style="padding: 16px 32px;
            margin:8px 0;
            background-color:white;
            ">


    <h1

    style="padding:8px 0"
    >Convert Images to WebP to GIF Online</h1>

    <div>





        @if (isset($fileInfoItems))

        @if ($fileInfoItems)






<div class="container-fluid">


    <div class="row">




        @foreach($fileInfoItems as $fileInfoItem)




    <div class="col-sm-6">


        <div style="


padding: 8px;


height:240px;
text-align:center;


        ">
            <img



style="    max-width:100%;
max-height:100%;
position: relative;"

            alt="

            "
            src="{{$fileInfoItem[0]}}"/>



        </div>


        <table class="styled-table">
            <thead >
                <tr >
                    <th style="color: white;">File Attributes</th>
                    <th style="color: white;">Info</th>
                </tr>
            </thead>
            <tbody>




                @if ($fileInfoItem[1]->width)

                <tr>
                    <td>Width</td>
                    <td>{{$fileInfoItem[1]->width}} PX</td>
                </tr>
                @endif

                @if ($fileInfoItem[1]->height)

                <tr>
                    <td>Height</td>
                    <td>{{$fileInfoItem[1]->height}} PX</td>
                </tr>
                @endif

                @if ($fileInfoItem[1]->original_size)
                <tr>
                    <td>Original Size</td>
                    <td>{{$fileInfoItem[1]->original_size}}</td>
                </tr>
                @endif



                @if ($fileInfoItem[1]->f_type)
                <tr>
                    <td>Type</td>
                    <td>{{$fileInfoItem[1]->f_type}}</td>
                </tr>
                @endif


                @if ($fileInfoItem[1]->f_format)

                <tr>
                    <td>Format</td>
                    <td>{{$fileInfoItem[1]->f_format}}</td>
                </tr>

                @endif


                @if ($fileInfoItem[1]->mode)
                <tr>
                    <td>Mode</td>
                    <td>{{$fileInfoItem[1]->mode}}</td>
                </tr>
                @endif



            </tbody>
        </table>



    </div>


 @endforeach


    </div>

    </div>


    @endif
    @endif











@if (isset(
    $formUrl
))

<form



enctype="multipart/form-data" method="POST"
action='
{{$formUrl}}
'>


@csrf




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
  Convert All Images to WebP to GIF!!!
</button>

</form>
@endif

</div>
</div>

</div>
