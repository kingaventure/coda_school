<h1>Liste des utilisateurs</h1>

<a href="index.php?component=user&action=create">
    <i class="fa-solid fa-plus"></i>
</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Actif</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php  echo $user['id'] ?></td>
            <td><?php  echo $user['username'] ?></td>
            <td>
            <a href="index.php?component=users&action=toggle_enabled&id=<?php echo $user['id']; ?>">
            <i class="fa-solid <?php echo ($user['enabled']) ? 'fa-check text-success' : 'fa-solid fa-xmark text-danger' ?>">
            </i>
            </a>   
            </td>
            <td>
                <a href="index.php?component=users&action=delete&id=<?php echo $user['id']; ?>">
                    <i class="fa-solid fa-trash text-danger"></i>
                </a>
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