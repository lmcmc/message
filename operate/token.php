<?php
header("content-type:text/html;charset=utf-8");
require "vendor/autoload.php";

use \Firebase\JWT\JWT;

function myToken($username){
    //签发Token
    $key = '520'; //key
    $time = time(); //当前时间
    $payload = [
        'iss' => 'http://www.helloweba.net', //签发者 可选
        'aud' => 'http://www.helloweba.net', //接收该JWT的一方，可选
        'iat' => $time, //签发时间
        'nbf' => $time , //(Not Before)：某个时间点后才能访问，比如设置time+30，表示当前时间30秒后才能使用
        'exp' => $time+7200, //过期时间,这里设置2个小时
        'data' => [ //自定义信息，不要定义敏感信息
                'login' => 1,
                'username' => $username
        ]
    ];
    $jwt = JWT::encode($payload, $key);
    return $jwt;
}
