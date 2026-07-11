<?php

function GO($url){
    header("location: $url");
}

function INCLUDES($url){
    require __DIR__ ."/$url";
}