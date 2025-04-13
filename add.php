<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<style>
    form {
        width: 600px;
        margin: auto;
        margin-top: 50px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 20px;
    }
    h3{
        text-transform: capitalize;
    }
    label{
        margin-top: 10px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
    }
    input{
        margin-top: 10px;
        margin-bottom: 20px;
    }


</style>

<body>
    <form action="insert_ebook.php" method="POST" enctype="multipart/form-data">
        <h3>Add a New eBook to the Library</h3>
        <label for="title">Title:</label><br>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title" required>

        <label for="author_id">Author ID:</label><br>
        <input type="number" class="form-control" id="author_id" name="author_id" placeholder="Enter your Author ID" >

        <label for="category_id">Category ID:</label><br>
        <input type="number" class="form-control" id="category_id" name="category_id" placeholder="Enter your Category ID">

        <label for="description">Description:</label><br>
        <textarea id="description" class="form-control" name="description" placeholder="Enter your description"></textarea>

        <label for="language">Language:</label><br>
        <input type="text" class="form-control" id="language" name="language" placeholder="Enter your language">

        <label for="isbn">ISBN:</label><br>
        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter Your ISBN">

        <label for="cover_image">Cover Image:</label><br>
        <input type="file" class="form-control" id="cover_image" name="cover_image">

        <label for="file_path">eBook File:</label><br>
        <input type="file" class="form-control" id="file_path" name="file_path" required>

        <label for="price">Price:</label><br>
        <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Enter Your Price">

        <label for="is_free">Is Free:</label><br>
        <select id="is_free" name="is_free">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select><br>

        <label for="published_at">Published At:</label><br>
        <input type="date" class="form-control" id="published_at" name="published_at">

        <input type="submit" value="Add eBook">

    </form>

</body>

</html>