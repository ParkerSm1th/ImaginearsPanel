<?php
session_start();
if (!isset($_SESSION['apply']['ign'])) {
  echo 0;
} else {
  echo 1;
}
 ?>
