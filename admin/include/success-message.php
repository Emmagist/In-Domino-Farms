<?php
    // require "libs/process.php";

    if (isset($success)) {
        foreach ($success as $succes) {
            echo "<li class='alert alert-success list-unstyled text-center'>".$succes."</li>";
        }
    }

?>

<script>
    setInterval(() => {
        $('.alert-success').hide();
    }, 3000);
</script>