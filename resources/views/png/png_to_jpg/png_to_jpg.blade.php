<h1 style="font-weight: 400">PNG to JPG Online</h1>

<div style="margin-top: 24px;
background-color: #EFEFEE;
padding:16px 8px;

">

    <div style="padding:8px;
background-color: white;
">


        <div class="tab">
            <button class="tablinks"

                    onclick="openCity(event, 'London')">Files Upload</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Image URI</button>
        </div>



        <form method="POST" action="/image-converter/png-to-jpg"

              enctype="multipart/form-data"
        >


        <div style="padding: 8px;
            background-color:orange;



            ">

                <p style="font-size:16px;
                color:white;
                ">

                    For better conversion only upload WebP formats to convert to PNG to JPG fromat.
                </p>

            </div>

        @csrf <!-- {{ csrf_field() }} -->
            <div id="London"

                 style="display: block;
padding-top: 16px;
"
                 class="tabcontent">
                <h3

                >Choose Image Files</h3>

                <p>Upload image files from your computer:
                </p>

                <div style="padding:8px 0">

                    <input type="file" name="choose-files[]" multiple

                    accept="image/*"
                    >
                </div>


            </div>

            <div id="Paris" class="tabcontent">

                <h3

                >Select Image</h3>

                <p>Upload image from your computer:
                </p>

                <div style="padding:8px 0">

                    <input type="url"
                           name="image-uri"

                           style="padding:8px"
                           placeholder="https:// or data:..."
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
                <p>Supported image types: JPEG , PNG, WEBP, GIF and All other image formats.
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





@if(isset($image_pngtojpg))



<div
style="





background-color:#32CD32;
margin:8px 0;

color:white
"


>



    <p style="
    padding:8px;

    color:white;
    margin-bottom:0;
    ">

        For permanent links you can use: https://www.imageresizeronline.com
        /image-converter/png-to-jpg?url=https://example.com/source-image.gif


    </p>





</div>



<div
style="




padding:8px;

background-color: #EFEFEE;
margin:8px 0;
"


>



<h1>


    Image Converter Online PNG to JPG
</h1>

    <p

    style="
    padding:4px;

    "
    >
        There is no need to install any additional
        software on your computer to make Simple Image
        Converter do its job. You simply browse go to
         www.imageresizeronline.com/image-converter/png-to-jpg and
         upload the images you want to convert png to jpg. The file formats supported by Simple Image Converter include JPEG, PNG , WEBP, GIF and All other image formats.

    </p>


    <p  style="
    padding:4px;

    ">

        All you need to do is upload your image file and click "Convert". Then you can download or edit the produced image file.


    </p>

</div>

@endif



</div>
