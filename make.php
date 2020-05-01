<?php
require "deps/scss.inc.php";
$scss = new scssc();
$scss->setFormatter("scss_formatter_compressed");
$input = file_get_contents("wp3.scss");
$output = $scss->compile($input);
file_put_contents("wp3.css", $output);
