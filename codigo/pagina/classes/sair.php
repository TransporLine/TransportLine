<?php
 session_name('i9solutions-transporline');
    session_start();
    session_destroy();
     header('location:?tl=inicio');
?>