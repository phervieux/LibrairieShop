<?php

    function captcha($post){
        $captchaimg = array(
            '1'=>'83tsU',
            '2'=>'viearer',
            '3'=>'ZZECEL'
        );
        if(!isset($post['submit'])){
            $captcharnd = rand(1, 3);
            $_SESSION['captcha'] = $captchaimg[$captcharnd];
        }
        return $captchaimg;
    }