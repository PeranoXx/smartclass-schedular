<?php

if(!function_exists('authUser')){
    function authUser(){
        if(auth('web')->check()){
            return auth()->user();
        }
        if(auth('institute')->check()){
            return auth('institute')->user();
        }
    }
}