<!DOCTYPE html>
<html lang="en">

<!-- Header include -->
<?php include 'header.inc'; ?>

<!-- navigation include -->
<?php include 'nav.inc'; ?>
<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>
    <!-- footer -->
    <?php include 'footer.inc' ?>
</body>

</html>