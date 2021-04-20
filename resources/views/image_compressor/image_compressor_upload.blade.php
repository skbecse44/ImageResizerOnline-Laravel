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



<script>




function showVal(val){


document.getElementById('update-perc')
.innerHTML=val;
}

    </script>




<div style="padding: 16px 32px;
            margin:8px 0;
            background-color:white;
            ">


    <h1

    style="padding:8px 0"
    >Compress Image Online</h1>




    <div style="text-align: center;


    ">




        @if (isset($imageUri))

        <img



        style="max-width:100%"

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
                <td>Width</td>
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






@if (isset(
    $formUrl
))

<form



enctype="multipart/form-data" method="POST"
action='
{{$formUrl}}
'>


@csrf


<div style="padding:8px ;

background-color:orange;
color:white;
">
    Reduce the level to compress

</div>

<h1>Choose the percentage level to compress image</h1>


<div id="range-percentage"

style="   margin:8px 0;

padding:8px 16px;
border:1px solid silver;
opacity:1;"
>


  <div id ="option-optimize-wrapper" >

      <h3>By Percentage </h3>
      <input
          name='compress-perc'

          style='width:inherit'
          type="range"
          max="100"
          min="1"
          value='80'


          oninput="showVal(this.value)" onchange="showVal(this.value)"

      />

      <p>

          Currently the percentage is <span id="update-perc" >
              80
          </span>
      </p>



  </div>

</div>
<div>






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
  Compress Image !!!
</button>

</form>
@endif

</div>
</div>

</div>
