<?php
// simple redirect function 
function redirect($page) {
    header('location: '.URL_ROOT.'/'.$page);
}

?>