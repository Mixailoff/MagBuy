<?php
//Include Error Handler
require_once '../../../utility/error_handler_dir_back.php';

//Include Admin check
require_once '../../../utility/admin_session.php';

//Autoload to require needed model files
function __autoload($className)
{
    $className = '..\\..\\..\\' . $className;
    require_once str_replace("\\", "/", $className) . '.php';
}

if (isset($_GET['uid'])) {

    //Validation
    if (!($_GET['stat'] == 1 || $_GET['stat'] == 0)) {
        header('HTTP/1.1 400 Bad Request', true, 400);
        die();
    }

    //Try to accomplish connection with the database
    try {
        $userId = $_GET['uid'];
        $newStatus = $_GET['stat'];

        $userDao = \model\database\UserDao::getInstance();
        $userDao->banUnbanUser($userId, $newStatus);

        header("Location: ../../../view/admin/users/users_view.php");

    } catch (PDOException $e) {
        $message = date("Y-m-d H:i:s") . " " . $_SERVER['SCRIPT_NAME'] . " $e\n";
        error_log($message, 3, '../../../errors.log');
        header('HTTP/1.1 500 Internal Server Error', true, 500);
        die();
    }
} else {
    header('HTTP/1.1 400 Bad Request', true, 400);
    die();
}