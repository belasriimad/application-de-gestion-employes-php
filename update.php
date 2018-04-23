<?php 
include('includes/header.php');
include('database/functions.php');
$errors = [];
$message = "";
$id = $_GET['id'];
$result = get_emp_by_id($con,$id);
$row = $result->fetch_assoc();
if(isset($_POST['submit'])):
   $nom = htmlentities(trim($_POST['nom']));
   $prenom = htmlentities(trim($_POST['prenom']));
   $age = htmlentities(trim($_POST['age']));
   $service = htmlentities(trim($_POST['service']));
   $matricule = htmlentities(trim($_POST['matricule']));
   if(empty($nom)):
      $errors = 'veuillez entrer le nom';
   elseif(empty($prenom)):
      $errors =  'veuillez entrer le prenom';
   elseif(empty($age)):
      $errors = 'veuillez entrer l\'age';
   elseif(empty($service)):
      $errors =  'veuillez entrer le service';
   elseif(empty($matricule)):
      $errors =  'veuillez entrer la matricule';
   else :
      $values = array(
         'nom' => $nom,
         'prenom' => $prenom,
         'age' => $age,
         'service' => $service,
         'matricule' => $matricule,
      );
      if(emp_update($con,$id,$values) === true):
          redirect('index.php?message=updated');
      else:
          $message = '<div class="alert alert-danger">Une erreur est survenue veuillez réessayer!</div>';
      endif;
   endif;
endif;
?>
    <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto mt-4">
                <div class="card">
                    <h3 class="card-title text-info pt-2 px-3 text-center mb-0">Modifier un employé</h3>
                    <hr>
                    <?php 
                        if(!empty($errors)):
                            echo '<div class="alert alert-danger">'.$errors.'</div>';  
                        else:
                            echo $message;
                        endif;
                    ?>
                    <div class="card-body">
                        <form action="update.php?id=<?php echo $row['id'];?>" method="post">
                             <div class="form-group">
                                   <label for="nom">Nom*</label>
                                   <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" value="<?php echo isset($row['nom']) ? $row['nom'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="prenom">Prénom*</label>
                                   <input type="text" class="form-control" placeholder="Prénom" name="prenom" id="prenom" value="<?php echo isset($row['prenom']) ? $row['prenom'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="age">Age*</label>
                                   <input type="number" class="form-control" placeholder="Age" name="age" id="age" value="<?php echo isset($row['age']) ? $row['age'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="service">Service*</label>
                                   <input type="text" class="form-control" placeholder="Service" name="service" id="service" value="<?php echo isset($row['service']) ? $row['service'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="matricule">Matricule*</label>
                                   <input type="text" class="form-control" placeholder="Matricule" name="matricule" id="matricule" value="<?php echo isset($row['matricule']) ? $row['matricule'] : '';?>">
                             </div>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success" name="submit">Valider</button>
                             </div>
                        </form>
                    </div>
                </div>
             </div>
         </div>
    </div>
<?php include('includes/footer.php');?>