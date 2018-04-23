<?php 
include('includes/header.php');
include('database/functions.php');
$result = emp_get($con);
?>
    <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto mt-4">
                <div class="card">
                    <div class="card-body">
                    <?php 
                        if(isset($_GET['message']) && $_GET['message'] == "success"):
                            echo '<div class="alert alert-success">Employé ajouté avec succés</div>';
                        elseif(isset($_GET['message']) && $_GET['message'] == "updated"):
                            echo '<div class="alert alert-warning">Employé Modifié avec succés</div>';
                        elseif(isset($_GET['message']) && $_GET['message'] == "deleted"):
                            echo '<div class="alert alert-danger">Employé supprimé avec succés</div>';
                        endif;
                    ?> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Age</th>
                                    <th>Service</th>
                                    <th>Matricule</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($row = $result->fetch_assoc()):?>
                                <tr>
                                    <td><?php echo $row['nom'];?></td>
                                    <td><?php echo $row['prenom'];?></td>
                                    <td><?php echo $row['age'];?></td>
                                    <td><?php echo $row['service'];?></td>
                                    <td><?php echo $row['matricule'];?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-xs"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>
    </div>
<?php include('includes/footer.php');?>