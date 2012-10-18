<?php
session_destroy();
  session_unset($_SESSION['username']);
  session_unset($_SESSION['user_id']);

  header("Location: /", TRUE, 301);   