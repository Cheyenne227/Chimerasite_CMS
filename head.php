<head>
    <meta charset="utf-8">
    <title>Stargazer</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">   
    <link href="css/root.css" rel="stylesheet" type="text/css">

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/parsley.min.js"></script>

    <script type="text/javascript">
        $(function () 
        {
            $('#help-form').parsley().on('field:validated', function() 
            {
                var ok = $('.parsley-error').length === 0;
            })
            .on('form:submit', function() 
            {
                AlertForm();
            });
        });
    </script>
</head>