<?php
    if( !empty($_GET['location']) ) {
        $maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($_GET['location']);
        
        $maps_json = file_get_contents($maps_url);

        $maps_array = json_decode($maps_json, true);

        $lat = $maps_array['results'][0]['geometry']['location']['lat'];
        $lng = $maps_array['results'][0]['geometry']['location']['lng'];

        $instagram_url = 'https://api.instagram.com/v1/media/search?lat=' . $lat . '&lng=' . $lng . '&client_id=59cd273f121d4139b97a8a027a993ddf';

        $instagram_json = file_get_contents($instagram_url);
        $instagram_array = json_decode($instagram_json, true);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geogram</title>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="location">
        <button type="submit">Submit</button>
    </form>
</body>
</html>