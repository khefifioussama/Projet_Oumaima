


<?php
include '../model/connect.php';
$obj = new Db();




?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
<link rel="stylesheet" href="../css/alert.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php include '../view/navbar.php'; ?>

<main>

    <div class="recent-orders">
        <h2>Recent Orders</h2>
        <table id="o">
            <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>email</th>
                <th>telephone fix</th>
                <th>adresse</th>
                <th>photo</th>
                <th>action</th>
            </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM clients";
            $q=$obj->con->prepare($sql);
            $q->execute();
            foreach($q as $data)
            {
            ?>
            <tr>
                <td><?php echo $data["id"] ?></td>

                <td><?php echo $data["name"] ?></td>

                <td><?php echo $data["email"] ?> </td>

                <td><?php echo $data["phone"] ?></td>

                <td><?php echo $data["adress"] ?></td>

               <td> <img src="../model/PHOTO/<?php echo $data["photo"] ?>"style="width:100px; height: auto;" alt="Client Photo"/>
               </td>
                <td>
                    <a href="vue.php?id= <?php echo $data['id']?>" ><i class="fas fa-eye"></i> </a>&nbsp;&nbsp;
                    <a href="updateC.php?id= <?php echo $data['id']?>" ><i class="fas fa-edit"></i> </a>&nbsp;&nbsp;
                    <form method="post" style="display: inline-block;" action="../model/ajax.php?id=<?php echo $data['id'] ?>"> 
                    <button class="ouma" > <input type="hidden" name="action" value="deluser">
                    <a href="#" onclick="return confirmDelete(<?php echo $data['id']?>)"><i class="fas fa-trash"></i> </a>
                </button></form>
                </td>

            </tr>
<?php } ?>

        </table>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#o').DataTable({
                    "paging": true,
                    "ordering": true,
                    "searching": true,
                    "lengthChange": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "All"]]
                });
            });
        </script>
        <a href="#">Show All</a>
    </div>
    <!-- End of Recent Orders -->

</main>

<!-- Right Section -->
<div class="right-section">
    <div class="nav">
        <button id="menu-btn">
            <span class="material-icons-sharp">
                menu
            </span>
        </button>
        <div class="dark-mode">
            <span class="material-icons-sharp active">
                light_mode
            </span>
            <span class="material-icons-sharp">
                dark_mode
            </span>
        </div>

        <div class="profile">
            <div class="info">
                <p>Hey, <b>omar</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="../images/omar.jpg" alt="">
            </div>
        </div>

    </div>
    <!-- End of Nav -->


</div>
    <!-- sabit script sytle lkoll m3a b3adhhoum :') -->

<div id="deleteAlert" class="alert" style="display: none;">
    <div class="alert-content">
        <p>Voulez-vous vraiment supprimer ce client ?</p>
        <div class="alert-buttons">
            <button id="confirmDeleteBtn">Oui</button>
            <button id="cancelDeleteBtn">Non</button>
        </div>
    </div>
</div>


<script>
    // Confirmation de suppression 
    function confirmDelete(id) {
        var alertBox = document.getElementById("deleteAlert");

        alertBox.style.display = "block";

        var clientIdToDelete = id;

        document.getElementById("confirmDeleteBtn").onclick = function() {
            // Redirection après suppression
            window.location.href = "../model/ajax.php?action=deluser&id=" + clientIdToDelete;
            // Affichage de l'alerte "Client removed"
            alert("Client removed");

            // Ajoutez le code pour afficher l'alerte de succès ici
            document.getElementById("successAlert").style.display = "block";
        };

        document.getElementById("cancelDeleteBtn").onclick = function() {
            alertBox.style.display = "none";
        };

        return false;
    }
</script>
<style>
.alert {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.alert-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #750550;
    width: 50%;
    max-width: 400px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.alert-buttons {
    text-align: right;
    margin-top: 10px;
}

.alert-buttons button {
    background-color: #750550;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    margin-left: 5px;
}

.alert-buttons button:hover {
    background-color: #4c1130;
}

</style>





<script src="../js/orders.js"></script>

</body>

</html>