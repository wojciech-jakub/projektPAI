<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/styleindex.css">
</head>
<body>

<div class="container">
    <div class="row">
        <h2>
            RENTAL CAR
        </h2>

    </div>
    <div class = "info">
        <button class="tablink" onclick="openPage('Home', this, '#755')">Home</button>
        <button class="tablink" onclick="openPage('News', this, '#755')" id="defaultOpen">News</button>
        <button class="tablink" onclick="openPage('Contact', this, '#755')">Contact</button>
        <button class="tablink" onclick="openPage('About', this, '#755')">About</button>

        <div id="Home" class="tabcontent">
            <h3>Home</h3>
            <p>Home is where the heart is..</p>
        </div>

        <div id="News" class="tabcontent">
            <h3>News</h3>
            <p>Some news this fine day!</p>
        </div>

        <div id="Contact" class="tabcontent">
            <h3>Contact</h3>
            <p>Get in touch, or swing by for a cup of coffee.</p>
        </div>

        <div id="About" class="tabcontent">
            <h3>About</h3>

        </div>

        <script>
            function openPage(pageName,elmnt,color) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }
                document.getElementById(pageName).style.display = "block";
                elmnt.style.backgroundColor = color;

            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </div>



</body>
</html>