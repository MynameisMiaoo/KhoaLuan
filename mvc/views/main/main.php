
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div><?php
    require_once "./mvc/views/block/header.php";
?>
</div>
<div><?php
require_once "./mvc/views/page/".$data["page"].".php";
?>    
</div>
<?php
    require_once "./mvc/views/block/footer.php";
?>
</body>
</html>