<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>title</title>
    <link rel="stylesheet" href="linkToCSS" />
</head>

<body>
    @if (Session:: has('statut'))
    
        {{ Session::get('statut') }}
    
    @endif
</body>

</html>