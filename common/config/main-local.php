<?php
return [
    'components' => [
        //配置缓存
//        'cache'=>[
//            'class'=>'yii\db\FileCache',
//        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=cdb-5t2zblr8.cd.tencentcdb.com:10035;dbname=yii',
            'username' => 'root',
            'password' => 'wanan521zhao',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'language'=>'zh-CN',
    'timeZone'=>'Asia/Chongqing',

];
