<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REST API</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> <!-- src link za ajax za API -->
   
    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
    

    @stack('script') <!-- koga ke stavam <script> </script> vo HTML kodot da bide sekogas pred zatvaranje na </body> tagot !!  -->
</body>
</html>