<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="d-flex flex-column justify-content-center" style="height: 100vh">
        <div style="max-width: 300px; margin: auto;">
            <a class="btn btn-primary w-100 mb-2 btn-lg" target="_blank" href="{{ route('solution', 1) }}">Solution
                1</a>
            <a class="btn btn-primary w-100 mb-2 btn-lg" target="_blank" href="{{ route('solution', 2) }}">Solution
                2</a>
            <a class="btn btn-primary w-100 mb-2 btn-lg" target="_blank" href="{{ route('solution', 3) }}">Solution
                3</a>
        </div>
    </div>
</body>

</html>
