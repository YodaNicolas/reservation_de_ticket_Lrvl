<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>page ticket</title>
    <link rel="stylesheet" href="linkToCSS" />
</head>

<body>

    <form method='post' action="{{route('deconection')}}">
        @csrf
        <input type='submit' value='deconnecte'>
    </form>



</body>

</html>