<?php
session_start();
session_destroy();
header('Location: ../../vue/page_ouverture.php');