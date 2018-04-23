<?php 
include('includes/header.php');
include('database/functions.php');
$errors = [];
$message = "";
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
      if(emp_insert($con,$values) === true):
          redirect('index.php?message=success');
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
                    <h3 class="card-title text-info pt-2 px-3 text-center mb-0">Ajouter un employé</h3>
                    <hr>
                    <?php 
                        if(!empty($errors)):
                            echo '<div class="alert alert-danger">'.$errors.'</div>';  
                        else:
                            echo $message;
                        endif;
                    ?>
                    <div class="card-body">
                        <form action="add.php" method="post">
                             <div class="form-group">
                                   <label for="nom">Nom*</label>
                                   <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="prenom">Prénom*</label>
                                   <input type="text" class="form-control" placeholder="Prénom" name="prenom" id="prenom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="age">Age*</label>
                                   <input type="number" class="form-control" placeholder="Age" name="age" id="age" value="<?php echo isset($_POST['age']) ? $_POST['age'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="service">Service*</label>
                                   <input type="text" class="form-control" placeholder="Service" name="service" id="service" value="<?php echo isset($_POST['service']) ? $_POST['service'] : '';?>">
                             </div>
                             <div class="form-group">
                                   <label for="matricule">Matricule*</label>
                                   <input type="text" class="form-control" placeholder="Matricule" name="matricule" id="matricule" value="<?php echo isset($_POST['matricule']) ? $_POST['matricule'] : '';?>">
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