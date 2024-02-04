<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Data and Document Imformation -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="Script/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="Script/bootstrap.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="Script/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Coca.Cola - Website</title>
</head>

<body>

    <!-- Navigation Bar -->
    <section>
        <nav class="navbar navbar-dark" style="background-color: black;">

            <!-- Hamburger Menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbarToggler7"
                aria-controls="myNavbarToggler7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Coca Cola Logo -->
            <a class="mx-auto" href="index.php"
                style="font-family: Nice Font;font-size: 1rem;color: white;text-decoration: none;margin-top: 10px;">
                <h2>Coca Cola</h2>
            </a>

            <!-- Search Button -->
            <div class="d-block">
                <button class="btn btn-light blackDisplay" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight"><i class="bi bi-search"></i></button>
            </div>

            <!-- Hamburger Menu Options -->
            <div class="collapse navbar-collapse" id="myNavbarToggler7">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="models.php">Models</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contac Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <!-- Menu For User Option Selection -->
    <section>
        <div class="container">
            <div class="row itemDisplayRow">
                <div class="col-sm">
                    <a href="models.php"
                        class="d-flex justify-content-center align-items-center rounded-circle mx-auto">
                        <img src="Images/model.jpg" alt="your-image-alt" class="rounded-circle"
                            style="height: 250px; width: 250px;">
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                            <h4 style="color: white;">Models</h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="#" class="d-flex justify-content-center align-items-center rounded-circle mx-auto">
                        <img src="Images/aboutus.jpg" alt="your-image-alt" class="rounded-circle"
                        style="height: 250px; width: 250px;">
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                            <h4 style="color: white;">About Us</h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm">
                    <a href="#" class="d-flex justify-content-center align-items-center rounded-circle mx-auto">
                        <img src="Images/contactus.jpg" alt="your-image-alt" class="rounded-circle"
                        style="height: 250px; width: 250px;">
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                            <h4 style="color: white;">Contact Us</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Of Website-->
    <section id="footer" style="background-color: #cf0919;">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class=" d-flex align-items-center">
                <span class="text-muted" style="color: white !important;">© 2018 #D Apps | <a href="#" onclick="restyle()"> Restyle </a>
                        | <a href="#" onclick="reset()"> Reset</a></span>
                </div>
                <ul class="nav justify-content-end list-unstyled d-flex" style="color: white !important;">
                    <i class="bi bi-facebook footerIcon"></i>
                    <i class="bi bi-twitter footerIcon"></i>
                    <i class="bi bi-instagram footerIcon"></i>
                    <i class="bi bi-google footerIcon"></i>
                </ul>
            </footer>
        </div>
    </section>


    <script>
        function restyle(){
            document.getElementById('footer').style.backgroundColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
        }
        function reset(){
            document.getElementById('footer').style.backgroundColor = "#cf0919";
        }
    </script>
</body>

</html>