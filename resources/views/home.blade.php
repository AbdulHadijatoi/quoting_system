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
            background: linear-gradient(to right, navy, transparent), url({{ asset('assets/images/front_bg.jpeg') }}) no-repeat center center fixed;
            background-size: cover;
        }

        .quote-form {
            max-width: 600px;
            background: #fff;
            border-radius: 25px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            padding: 25px;
            margin: 0 auto;
        }

        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-primary:hover {
            background-color: #004494;
        }
        .tab-content {
            border-left: 1px solid rgba(0,0,0,0.1);
            border-right: 1px solid rgba(0,0,0,0.1);
            border-top: 0px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            border-radius: 0px 0px 15px 15px;
        }
        .tab-content > .tab-pane {
            display: none;
        }
        .tab-content > .active {
            display: block;
        }
        .text-navy {
            color: navy;
        }
        .full-width {
            width: 100%;
        }
        .nav-link {
            color: black;
            font-weight: 500;
        }

        .form-label {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="row align-items-center w-100">
            <div class="col-md-6 text-white p-4">
                <h3>Online quoting tool</h3>
                <h1>Looking for a cargo fare quick and easy?</h1>
                <p>Just as if it were a plane ticket, book your import and additional services.</p>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <div class="quote-form">
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

                    <h2 class="my-4">Quote your imports</h2>
                    <ul class="nav nav-tabs" id="quoteFormTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="step2-tab" data-bs-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Carga suelta (LCL)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">Contenedor(es) (FCL)</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content p-4">
                        <form id="step2" action="{{ url('generate-pdf') }}" class="tab-pane active" role="tabpanel" aria-labelledby="step2-tab" method="POST">
                            @csrf
                            <h4 class="mb-3">Details of your Loose Cargo (LCL)</h4>

                            @include('components.lcl-form')
                            
                            <button type="submit" class="btn btn-primary btn-block full-width mt-3">Calcular</button>
                        </form>

                        <form id="step3" action="{{ url('generate-pdf') }}" class="tab-pane" role="tabpanel" aria-labelledby="step3-tab" method="POST">
                            @csrf
                            <h4 class="mb-3">Details of your cargo (FCL)</h4>

                            @include('components.fcl-form')
                            
                            <button type="submit" class="btn btn-primary btn-block full-width mt-3">Calcular</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
