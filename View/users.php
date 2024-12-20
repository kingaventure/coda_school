<h1>Liste des utilisateurs</h1>

<a href="index.php?component=user&action=create">
    <i class="fa-solid fa-plus"></i>
</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">
        <a href="index.php?component=users&sortby=id">
        Id
        </a>
      </th>

      <th scope="col">
        <a href="index.php?component=users&sortby=username">
        Username
        </a>
      </th>

      <th scope="col">
        <a href="index.php?component=users&sortby=email">
        Email
        </a>
      </th>

      <th scope="col">
        <a href="index.php?component=users&sortby=enabled">
        Actif
        </a>
      </th>

      <th scope="col">
        Action
      </th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php  echo $user['id'] ?></td>
            <td><?php  echo $user['username'] ?></td>
            <td><?php  echo $user['email'] ?></td>
            <td>
              <?php if($user['id'] !== $_SESSION['user_id']) : ?>
              <a href="index.php?component=users&action=toggle_enabled&id=<?php echo $user['id']; ?>">
              <i class="fa-solid <?php echo ($user['enabled']) ? 'fa-check text-success' : 'fa-solid fa-xmark text-danger' ?>">
            </i>
            </a>
                <?php else: ?>
                  <i class="fa-solid <?php echo ($user['enabled']) ? 'fa-check text-success' : 'fa-solid fa-xmark text-danger' ?>"
                  title = "eee">
                    
                  <?php endif; ?>
            </td>
            <td>
              <?php if($user['id'] !== $_SESSION['user_id']) : ?>
                <a href="index.php?component=users&action=delete&id=<?php echo $user['id']; ?>"
                onclick="return confirm('Etes vous sur de vouloir supprimer')";>
                    <i class="fa-solid fa-trash text-danger"></i>
                </a>
                <?php endif; ?>
            </td>
            <td>
                <a href="index.php?component=user&action=edit&id=<?php echo $user['id']; ?>">
                    <i class="fa-solid fa-pencil ms-2"></i>
                </a>
            </td>
            
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>