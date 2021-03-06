<!DOCTYPE html>
<html>
<title>CAFSI | CLMR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="/assets/css/app.css">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Raleway", sans-serif
    }

    body,
    html {
        height: 100%;
        line-height: 1.8;
        background-color: whitesmoke;
    }

    /* Full height image header */
    .bgimg-1 {
        background-position: center;
        background-size: cover;
        background-image: url("/assets/img/photo-360622.jpg");
        min-height: 100%;
    }

    .bgimg-2 {
        background-position: center;
        background-size: cover;
        background-image: url("/assets/img/photo-48604.jpg");
        min-height: 100%;
    }

    .bgimg-3 {
        background-position: center;
        background-size: cover;
        background-image: url("/assets/img/photo-4299436.jpg");
        min-height: 100%;
    }

    .w3-bar .w3-button {
        padding: 16px;
    }
</style>

<body>

    @yield('content')

    <script>
        // Modal Image Gallery
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
      var captionText = document.getElementById("caption");
      captionText.innerHTML = element.alt;
    }
    
    
    // Toggle between showing and hiding the sidebar when clicking the menu icon
    var mySidebar = document.getElementById("mySidebar");
    
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
      } else {
        mySidebar.style.display = 'block';
      }
    }
    
    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
    }
    </script>
    <script src="https://kit.fontawesome.com/0db7df2fff.js" crossorigin="anonymous"></script>
    <script src="/assets/lte/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/lte/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>