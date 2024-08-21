<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .BackGround{
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
        }
        .BgInset{
            border-style: inset;
        }
    </style>

    <title>Welcome</title>
</head>
<body>
    <div class="container-fluid">

       <div class="text-center mt-3">
            <img src="{{ $message->embed('images/CompanyLogo/nanosoftSolutions Company Logo.png') }}">
            <p class="fs-2 fs-md-3 fw-bold pb-4">Welcome to NanoSoft Solutions <br> Bank Complaning WebApplication</p>
        </div>

        <div class="row d-flex justify-content-center mb-5">
            <div class="col-md-8 BackGround p-2 rounded">
                <p class="bg-primary-subtle p-2 text-dark rounded">
                    <span class="text-center p-2">
                        Hi {{ $userType }}, Welcome to Nanosoft Solution Bank Complaint Web App.
                        By using this web application, you can solve any computer related problem in your bank.
                        After submitting your question, your bank's administrator will check the problem and forward the message to Nanosoft Solution (Pvt)Ltd
                        Nanosoft Solution (Pvt)Ltd is here to solve your problem.
                    </span>
                <p>

                    <b>Your account details are below,</b> <br>
                    User Name : {{ $userType }} <br> 
                    User Type : {{ $userName }} <br>
                    User Email : {{ $userEmail }} <br>
                    User Contact Number : {{ $userContactNumber }} <br>
                    User Password :  {{ $userPassword }}

                    <br><br>

                    <small class="d-md-flex justify-content-md-end">
                        Your Registration Done By,<br>
                        {{ $RegisterUserType }} : {{ $RegisterAdminName }}<br>
                        Contact Details, <br>
                        {{ $RegisterAadminEmail }} <br>
                        {{ $RegisterAdminContactNumber }}
                    </small>
                    
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-5">
                        <button class="btn btn-primary me-md-2 px-5 btn-sm" type="button">Visit to Bank Complaint Web Application</button>
                    </div>
            </div>
        </div>

    </div>
</body>
</html>