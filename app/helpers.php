<?php

if(!function_exists('pageTitle')){
    function pageTitle(?string $title = null): string {
        return $title 
            ? $title . ' .::. ' . config('app.name') 
            : config('app.name');
    }
}