<?php

function logDeezNuts($message = "Hello")
{
    print($message);
    flush();
    ob_flush();
}
