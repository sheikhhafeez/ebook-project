<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>eBook Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card img {
            height: 300px;

        }

        .card {
            width: 300px;
            margin-bottom: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        h2{
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: "Lucida Handwriting";
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">eBook Library</h2>
        <div class="row">
            <?php
          
            $conn = new mysqli("localhost", "root", "", "ebooks");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

           
            $sql = "SELECT * FROM ebooks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                    <div class="col-md-3">
                        <div class="card mt-5">
                            <?php if (!empty($row['cover_image'])): ?>
                                <img src="../uploads/images/<?= $row['cover_image'] ?>" class="card-img-top" alt="Cover Image">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x300?text=No+Image" class="card-img-top" alt="No Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                                <p class="card-text"><?= substr(htmlspecialchars($row['description']), 0, 100) ?>...</p>
                                <p><strong>Price:</strong> <?= $row['is_free'] ? 'Free' : '$' . $row['price'] ?></p>
                               
                                <a href="edit_ebook.php?id=<?= $row['ebook_id'] ?>" class="btn btn-warning btn-sm">Edit</a>

                                <a href="delete_ebook.php?id=<?= $row['ebook_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this eBook?');">Delete</a>

                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            else:
                echo "<p class='text-center'>No eBooks found.</p>";
            endif;

            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>