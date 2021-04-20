
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

    <h1 style='margin-bottom:20px'>Download Optimized Image</h1>



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
