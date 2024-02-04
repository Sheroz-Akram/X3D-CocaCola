<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Data and Document Imformation -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript' src='X3D/x3dom.js'> </script>
    <link rel='stylesheet' type='text/css' href='Style/x3dom.css' />
    <link rel="stylesheet" href="Style/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="Script/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="Script/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="Script/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Coca Cola - Models</title>

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
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
                        <a class="nav-link" href="index.php">Home</a>
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


    <section id="modelBackground" style="background-color: #cf0919;padding: 10px;">
        <div class="container">
            <div class="row modelDisplayRow">
                <div class="col-sm">

                    <!-- Buttons For Model Selection -->
                    <h5 class="vertical-center modelViewOperationMessage" style="margin-bottom: 10px;">Select
                        Model:</h5>
                    <div id="modelSelectionBtns" class="btn-group" role="group" aria-label="Basic example">
                    </div>
                    </table>

                    <!-- Buttons to Do Differennt Operations-->
                    <div class="operations">
                        <h5 class="vertical-center modelViewOperationMessage">Camera:</h5>

                        <button type="button" onclick="changeCamera('CA_CA_FrontCamera');"
                            class="btn btn-secondary">Front</button>
                        <button type="button" onclick="changeCamera('CA_CA_BackCamera')"
                            class="btn btn-secondary">Back</button>
                        <button type="button" onclick="changeCamera('CA_CA_LeftCamera')"
                            class="btn btn-secondary">Left</button>
                        <button type="button" onclick="changeCamera('CA_CA_RightCamera')"
                            class="btn btn-secondary">Right</button>
                        <button type="button" onclick="changeCamera('CA_CA_TopCamera')"
                            class="btn btn-secondary">Top</button>

                        <h5 class="vertical-center modelViewOperationMessage">Animation:</h5>
                        <button type="button" class="btn btn-secondary" onclick="rotateModel('X')">Rotate X</button>
                        <button type="button" class="btn btn-secondary" onclick="rotateModel('Y')">Rotate Y</button>
                        <button type="button" class="btn btn-secondary" onclick="rotateModel('Z')">Rotate Z</button>
                        <button type="button" class="btn btn-secondary" onclick="resetAnimation()">Reset</button>


                        <h5 class="vertical-center modelViewOperationMessage">Render:</h5>
                        <button type="button" class="btn btn-secondary" onclick="wireFrame()">Wire</button>
                        <button type="button" class="btn btn-secondary" onclick="swapTexture()">Texture Swap</button>
                        <button type="button" class="btn btn-secondary" onclick="resetRender()">Reset</button>

                        <h5 class="vertical-center modelViewOperationMessage">Lights:</h5>
                        <button type="button" class="btn btn-secondary" onclick="headLightONOFF()">Headlight</button>
                    </div>
                </div>


                <div id="mainView" class="col-sm" style="background-color: #CF0919;text-align: center;">

                    <?php
                    // connect to the database
                    // connect to the database
                    $dsn = "sqlite:Server/database.db";
                    $dbh = new PDO($dsn);

                    // fetch data from the modeldata
                    $stmt = $dbh->query("SELECT md.ID, md.modelName, md.modelHeading, md.tagLine, md.description, md.fontFamily, md.primaryColor, md.secondaryColor, md.backgroundColor, md.modelTranslation, md.modelRotation, md.modelUrl FROM modeldata md");
                    $data = array();
                    $i = 0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        // Insert Dat
                        if (!isset($data[$row['ID']])) {
                            echo "<div id='" . $row['modelName'] . "' style='display:";

                            // If First Then Display It Otherwise display none
                            if ($i == 0) {
                                echo "block";
                                $i = 1;
                            } else {
                                echo "none";
                            }

                            // Insert Our Model URL
                            echo ";'><x3d class='wire' style='display: none;' height='500px' width='100%'>
                                <scene id='modelDisplayScene'>
                                    <inline nameSpaceName='" . $row['modelName'] . "Space' mapDEFToID='true' url='" . $row['modelUrl'] . "'>
                                    </inline>
                                </scene>
                            </x3d>
                        </div>";
                        }
                    }

                    ?>


                </div>


            </div>
        </div>
    </section>

    <!-- Model Data Imformation Menu -->
    <section style="background-color: black;padding: 40px;">
        <div class="container">
            <section>
                <nav class="navbar navbar-dark" style="background-color: black">
                    <a class="mx-auto" href="#"
                        style="font-family: Nice Font;font-size: 1rem;color: #CF0919;text-decoration: none;margin-top: 10px;">
                        <h1 id="modelName">1 oca Cola</h1>
                    </a>
                </nav>
            </section>
            <div class="row modelDisplayRow">
                <div class="col-sm">
                    <h1 id="modelHeading" class="modelHeading">Coca Cola Taste the Feeling</h1>
                    <p id="modelContent" style="color: white;text-align: justify;">Coca-Cola is one of the most
                        well-known and iconic soft drink brands in the world. With a history that dates back to 1886,
                        Coca-Cola has been a staple of American culture and a global phenomenon for over a century. Its
                        secret recipe, which includes a blend of natural flavors and caffeine, has remained unchanged
                        for decades, giving it a consistent taste that consumers know and love. With its red and white
                        branding, distinctive logo, and famous tagline "Taste the Feeling," Coca-Cola is a symbol of
                        happiness, refreshment, and enjoyment that is recognized and cherished around the world.</p>
                    <button id="buyButton" type="button" class="btn btn-primary">Buy Now</button>
                </div>

                <div class="col-sm" style="background-color: rgb(49, 49, 49);">
                    <div class="container" style="margin-top: 10px;text-align: center;">
                        <h3 style="color: white;">Picture Gallery</h3>
                        <div id="imageDisplayLocation" class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Of Website-->
    <section id="footer" style="background-color: #cf0919 !important;">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
                <div class=" d-flex align-items-center">
                    <span class="text-muted" style="color: white !important;">© 2018 #D Apps | <a href="#"
                            onclick="restyle()"> Restyle </a>
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

    <!-- Image Display Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Image Display</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body"></div>
            </div>
        </div>
    </div>


    <script src="Script/script.js"></script>
</body>

</html>