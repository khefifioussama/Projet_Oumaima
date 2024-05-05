<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/Form.css">



    <title>OMHO</title>
    <script src="https://kit.fontawesome.com/302d00db77.js" crossorigin="anonymous"></script>
    <style>
.sidebar  a .cl{
    position: absolute;
    right: 0;
    margin: 20px;
    transition: 0.3s ease;
}
.sub-menu{
    display: none;
}
 .sub-menu a span{
     padding-left: 20px;
     padding-bottom: 50px;

 }

.rotate{

    transform
:rotate(90deg);
}
    </style>

</head>

<body>

    <div class="container">



            <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../images/plus.png">
                    <h2>Omar<span class="danger">Prog</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../view/index.php">
                    <span class="material-icons-sharp">
                        home
                    </span>
                    <h3>Dashboard</h3>
                </a>

                <a class="sub-btn" >
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Clients</h3>
                    <span class="material-icons-sharp cl">

                    chevron_right

                    </span>
                </a>
<div class="sub-menu">
    <a href="../client/client.php">
        <i class="fas fa-plus"></i>Liste des clients
    </a>
    <a href="../client/addC.php">
        <i class="fas fa-plus"></i>Ajouter des clients
    </a>




</div>

                <a class="sub-btn" >
                    <span class="material-icons-sharp">
                        local_shipping
                    </span>

                <h3>Fourni</h3>
                <span class="material-icons-sharp cl">

                    chevron_right

                    </span>
                </a>
                <div class="sub-menu">
                    <a href="client.php">
                        <i class="fas fa-plus"></i>Liste des fournisseur
                    </a>
                    <a href="addC.php">
                        <i class="fas fa-plus"></i>Ajouter des fournisseur
                    </a>




                </div>

                <a href="#" >
                    <span class="material-icons-sharp">
                       business

                    </span>
                    <h3>Stock</h3>
                    <span class="message-count">!</span>

                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        shopping_cart
                    </span>
                    <h3>Commande</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Article</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Parametre</h3>
                </a>

                <div class="lougout">
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.sub-btn').click(function() {
                        $(this).next('.sub-menu').slideToggle();
                   $(this).find(`.cl`).toggleClass(`rotate`);
                    });
                });
            </script>

        </aside>
