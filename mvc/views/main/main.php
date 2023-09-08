<!DOCTYPE html>
<html>
    <div><?php
    require_once "./mvc/views/block/header.php";
    // require_once "./mvc/views/block/navbar.php";
?>
</div>
<div><?php
require_once "./mvc/views/page/".$data["page"].".php";
?>    
</div>
<div><?php
    require_once "./mvc/views/block/footer.php";
?>
</div>

</html>