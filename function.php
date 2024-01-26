<?php
function unsetSession()
{
    unset($_SESSION['register_errors']);
    unset($_SESSION['success']);
    unset($_SESSION['errors']);
    unset($_SESSION['product_errors']);
}


function checklogin()
{
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?action=login&controller=Auth");
        return false;
    }
    return true;
}
