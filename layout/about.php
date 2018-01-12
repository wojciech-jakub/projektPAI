<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <style>
        body{
            background: #DDD;
            font-family: 'Lato', sans-serif;
        }
        .center {
            margin-top: 10%;
            margin-bottom: 2%;
            margin-left: 30%;
            margin-right: 30%;
            line-height: 200px;
            height: auto;
            border: 3px solid green;
            text-align: center;
        }

        .center p {
            line-height: 1.5;
            display: inline-block;
            vertical-align: middle;
        }

        p{
            text-align: center;
        }
        button{
            margin-left: 49%;
        }
        mapholder{
            width: 20%;
        }
    </style>
</head>
<body>

<?php include_once "home.php"?>

<p id="demo">Where you can find us.</p>

<button onclick="getLocation()">Map</button>

<div id="mapholder"></div>

<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var latlon = position.coords.latitude + "," + position.coords.longitude;
        var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
            +latlon+"&zoom=14&size=400x300&key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU";
        document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
    }
    //To use this code on your website, get a free API key from Google.
    //Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
        }
    }
</script>

<div class="center">

    <p>
        Lorem ipsum dolor sit amet enim.
        Etiam ullamcorper.
        Suspendisse a pellentesque dui, non felis.
        Maecenas malesuada elit lectus felis, malesuada ultricies.
        Curabitur et ligula.
        Ut molestie a, ultricies porta urna.
        Vestibulum commodo volutpat a, convallis ac, laoreet enim.
        Phasellus fermentum in, dolor.
        Pellentesque facilisis. Nulla imperdiet sit amet magna.
        Vestibulum dapibus, mauris nec malesuada fames ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi.
        Aliquam erat ac ipsum. Integer aliquam purus.
        Quisque lorem tortor fringilla sed, vestibulum id,
        eleifend justo vel bibendum sapien massa ac turpis faucibus orci luctus non, consectetuer lobortis quis, varius in, purus.
        Integer ultrices posuere cubilia Curae, Nulla ipsum dolor lacus, suscipit adipiscing.
        Cum sociis natoque penatibus et ultrices volutpat.
        Nullam wisi ultricies a, gravida vitae, dapibus risus ante sodales lectus blandit eu,
        tempor diam pede cursus vitae, ultricies eu, faucibus quis, porttitor eros cursus lectus,
        pellentesque eget, bibendum a, gravida ullamcorper quam. Nullam viverra consectetuer.
        Quisque cursus et, porttitor risus. Aliquam sem. In hendrerit nulla quam nunc, accumsan congue.
        Lorem ipsum primis in nibh vel risus. Sed vel lectus. Ut sagittis, ipsum dolor quam.
    </p>

</div>
<?php include_once "footer.php"?>



</body>
</html>