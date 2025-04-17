<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

<?php
include "../../assets/includes/db.php";

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<div class="text-center mt-5">
    <p><a href="add-category.php" class="btn btn-primary">Add New Category</a></p>
</div>


<div class="container text-center mt-5">
    <h2>All Categories</h2>
    <table class="table table-bordered table-striped mx-auto" style="width: 80%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td>
                        <a href="edit-category.php?id=<?= $row['category_id'] ?>" class="btn btn-info btn-sm me-2">Edit</a>
                        <a href="delete-category.php?id=<?= $row['category_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                    </td>



                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>