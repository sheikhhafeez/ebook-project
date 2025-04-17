<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<style>
    form {
        width: 500px;
        margin: auto;
        margin-top: 100px;
    }
</style>

<body>
    <form action="ProcessBanner.php" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
        <div class="mb-3">
            <label for="title" class="form-label">Banner Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Banner Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Banner Image</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Banner</button>
    </form>



    <script>
        document.getElementById("image_input").addEventListener("change", function() {
            var input = this;
            var preview = document.getElementById("image_preview");
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
                preview.style.display = "none";
            }
        });
    </script>

</body>

</html>