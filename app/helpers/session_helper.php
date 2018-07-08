<?php
session_start();

// flash message helper
function flash($name = '', $message = '', $class = 'alert-red') {
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name.'_class'])) {
                unset($_SESSION[$name.'_class']);
            }
            
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = $_SESSION[$name.'_class'];
            echo '<span class="'.$class.'">'.$_SESSION[$name].'</span>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

function isLoggedIn() {
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

?>