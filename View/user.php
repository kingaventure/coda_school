<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php if(!empty($errors)): ?>
            <?php  foreach ($errors as $error): ?>
                <div class="alert alert-danger" role="alert">
                    <?php  echo $error; ?>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Identifiant</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo (isset($user['username'])) ? $user['username'] : '' ?>"  required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo (isset($user['email'])) ? $user['email'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Mot de passe</label>
                <input type="password" name="pass" id="pass" class="form-control" <?php echo isset($_GET['id']) ? null : 'required'?> >
            </div>
            <div class="mb-3">
                <label for="confirmation" class="form-label">Confirmation du mot de passe</label>
                <input type="password" name="confirmation" id="confirmation" class="form-control" <?php echo isset($_GET['id']) ? null : 'required'?> >
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" 
                    class="form-check-input" 
                    id="enabled" 
                    name="enabled" 
                    <?php echo (isset($user['enabled']) && $user['enabled']) ? 'checked' :null ?>  
                >
                <label class="form-check-label" for="enabled">Actif</label>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" 
                class="btn <?php echo (isset($_GET['id'])) ? 'btn-success' : 'btn-primary';  ?>"
                name="<?php echo (isset($_GET['id'])) ? 'edit_button' : 'valid_button';  ?>"
                
                >
                <?php echo isset($_GET['id']) ? 'Enregistrer' : 'Créer'; ?>
            </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>