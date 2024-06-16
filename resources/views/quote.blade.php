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
        .tab-content > .tab-pane {
            display: none;
        }
        .tab-content > .active {
            display: block;
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

        <h2>Get a Quote in 3 Simple Steps</h2>
        <ul class="nav nav-tabs" id="quoteFormTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Step 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="step2-tab" data-bs-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Step 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">Step 3</a>
            </li>
        </ul>

        <form id="quoteForm" action="{{ route('quote.submit') }}" method="POST">
            @csrf
            <div class="tab-content">
                <!-- Step 1 -->
                <div id="step1" class="tab-pane active" role="tabpanel" aria-labelledby="step1-tab">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="ruc" class="form-label">RUC / DNI</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" onclick="nextStep(2)">Next</button>
                </div>

                <!-- Step 2 -->
                <div id="step2" class="tab-pane" role="tabpanel" aria-labelledby="step2-tab">
                    <h3>Consolidated Load</h3>
                    <div class="mb-3">
                        <label for="volume" class="form-label">Volume</label>
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
                        <label for="firstImport" class="form-label">Have you imported before?</label>
                        <input type="text" class="form-control" placeholder="Yes or No" id="secondImport" name="secondImport">
                    </div>
                    <div class="mb-3">
                        <label for="typeOfGoods" class="form-label">Type of Goods</label>
                        <select class="form-control" id="typeOfGoods" name="typeOfGoods" required>
                            <option value="General Cargo">General Cargo</option>
                            <option value="Machinery">Machinery</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary btn-block" onclick="previousStep(1)">Previous</button>
                    <button type="button" class="btn btn-primary btn-block" onclick="nextStep(3)">Next</button>
                </div>

                <!-- Step 3 -->
                <div id="step3" class="tab-pane" role="tabpanel" aria-labelledby="step3-tab">
                    <h3>Container-FCL</h3>
                    <div class="mb-3">
                        <label for="equipment" class="form-label">Equipment</label>
                        <select class="form-control" id="equipment" name="equipment" required>
                            <option value="20 Standard">20 Standard</option>
                            <option value="40 HQ">40 HQ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="incotermFCL" class="form-label">Incoterm</label>
                        <select class="form-control" id="incotermFCL" name="incotermFCL" required>
                            <option value="FOB">FOB</option>
                            <option value="CIF">CIF</option>
                            <option value="EXW">EXW</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="polFCL" class="form-label">Port of Origin (POL)</label>
                        <select class="form-control" id="polFCL" name="polFCL" required>
                            <option value="Shanghai - (CNSHA)">Shanghai - (CNSHA)</option>
                            <option value="Ningbo - (CNNGB)">Ningbo - (CNNGB)</option>
                            <option value="Shenzhen - (CNSZX)">Shenzhen - (CNSZX)</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary btn-block" onclick="previousStep(2)">Previous</button>
                    <button type="submit" class="btn btn-primary btn-block">Send Quote</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function nextStep(step) {
            var emailField = document.getElementById('email');
            if (step === 2 && !emailField.checkValidity()) {
                emailField.reportValidity();
                return;
            }
            
            var tabs = document.querySelectorAll('.tab-pane');
            tabs.forEach(function(tab) {
                tab.classList.remove('active');
            });
            document.getElementById('step' + step).classList.add('active');

            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(navLink) {
                navLink.classList.remove('active');
            });
            document.querySelector('.nav-link[href="#step' + step + '"]').classList.add('active');
        }

        function previousStep(step) {
            var tabs = document.querySelectorAll('.tab-pane');
            tabs.forEach(function(tab) {
                tab.classList.remove('active');
            });
            document.getElementById('step' + step).classList.add('active');

            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(navLink) {
                navLink.classList.remove('active');
            });
            document.querySelector('.nav-link[href="#step' + step + '"]').classList.add('active');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
