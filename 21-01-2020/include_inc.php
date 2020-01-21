<?php
error_reporting(0);
include 'header.inc';
echo '<br>Displaying the header using include function<br>';
require 'header_name.inc';
echo '<br>Displaying the header using require function<br>';
require_once 'header_name.inc';
echo '<br>Will not display header again as require_once function is called';
?>