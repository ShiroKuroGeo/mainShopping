<?php
session_start();
require("UserDashboard.php");
if (isset($_POST['choice'])) {
    switch ($_POST['choice']) {
        //doGetAllDataUserOrdered
        case 'doGetAllDataUserOrdered':
            $backend = new UserDashboard();
            echo $backend->doGetAllDataUserOrdered();
            break;
        case 'doGetAllDataUserManageOrdered':
            $backend = new UserDashboard();
            echo $backend->doGetAllDataUserManageOrdered();
            break;
        case 'saveMultiple':
            $backend = new UserDashboard();
            echo $backend->saveMultiple($_POST['data']);
            break;
        default:
            echo "404";
            break;
    }
}