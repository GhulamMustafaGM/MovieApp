<?php

// Redirect page helper
function redirect($page)
{
  header('location: ' . URLROOT . '/' . $page);
}

