<?php
session_start();
session_destroy();

header("location:../../index_user.php?alert=logout");
