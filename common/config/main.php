<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        //默认的缓存数据被存储在各个应用的 runtime/cache 目录，我们可以通过 FileCache的cachePath进行修改。
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //authManager有PhpManager和DbManager两种方式,
        //PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
        "authManager" => [
            "class" => 'yii\rbac\DbManager',
        ],
    ],

];
