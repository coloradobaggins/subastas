<?php
/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 12/9/16
 * Time: 22:09
 */
unset($_SESSION["user"], $_SESSION["rol"]);
session_destroy();
header('Location: ?view=index');