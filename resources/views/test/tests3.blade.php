<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File to S3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function redirectToPath(event) {
            event.preventDefault(); // Prevent default form submission
            let filename = document.getElementById("filename").value;
            window.location.href = "/file/" + encodeURIComponent(filename);
        }
        </script>
</head>
<body>
    <div class="container mt-5">
        <h1>Upload File to S3</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <p><strong>File Path:</strong> {{ session('path') }}</p>
            <p><strong>Pre-Signed URL:</strong> <a href="{{ session('url') }}" target="_blank">{{ session('url') }}</a></p>
        @endif

        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Choose File</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <hr>

        <h2>Retrieve Uploaded File</h2>
        <form onsubmit="redirectToPath(event)">
           
            <div class="mb-3">
                <label for="filename" class="form-label">Enter File Name</label>
                <input type="text" class="form-control" id="filename" name="file" placeholder="e.g., example.jpg" required>
            </div>
            <button type="submit" class="btn btn-success">Get File</button>
        </form>
    </div>
</body>
</html>