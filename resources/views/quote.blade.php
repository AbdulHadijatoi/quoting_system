<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get a Quote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('/path-to-your-background-image') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-primary:hover {
            background-color: #004494;
            border-color: #004494;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('quote.submit') }}" method="POST">
            @csrf
            <h2>Get a Quote in 3 Simple Steps</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="volume" class="form-label">Volume of your cargo (m³)</label>
                <input type="text" class="form-control" id="volume" name="volume" required>
            </div>
            <div class="mb-3">
                <label for="incoterm" class="form-label">Incoterm</label>
                <select class="form-control" id="incoterm" name="incoterm" required>
                    <option value="FOB">FOB</option>
                    <option value="CIF">CIF</option>
                    <option value="EXW">EXW</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pol" class="form-label">Port of Origin (POL)</label>
                <select class="form-control" id="pol" name="pol" required>
                    <option value="Shanghai - (CNSHA)">Shanghai - (CNSHA)</option>
                    <option value="Ningbo - (CNNGB)">Ningbo - (CNNGB)</option>
                    <option value="Shenzhen - (CNSZX)">Shenzhen - (CNSZX)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pod" class="form-label">Port of Destination (POD)</label>
                <select class="form-control" id="pod" name="pod" required>
                    <option value="Valparaiso/San Antonio">Valparaiso/San Antonio</option>
                    <option value="Los Angeles">Los Angeles</option>
                    <option value="New York">New York</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send Quote</button>
        </form>
    </div>
</body>
</html>
