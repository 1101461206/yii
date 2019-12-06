<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    //默认访问地址
    'defaultRoute'=>'user-backend/index',
    'modules' => [],
    'name'=>"管理系统",
    'bootstrap' => ['log'],
    //语言
    'language'=>"zh-CN",
    //时区
    'timeZone'=>'Asia/beijing',
    'modules'=>[
        'redactor' => [
            'class' => 'common\components\RedactorModule',
            'uploadDir' => '@frontendupload/',       // 比如这里可以填写 ./uploads
            'uploadUrl' => '/frontend/web/upload/',  // 编辑器里展示的地址
            'imageAllowExtensions'=>['jpg','png','gif'],
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        //用户认证配置
        'user' => [
            'identityClass' => 'backend\models\Userbackend',
            'enableAutoLogin' => true,
            'loginUrl'=>array('backsite/login'),
           // 'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logFile'=>'@runtime/logs/'.date(Ymd).'/error/'.date(d).'.log',
                ],
                [
                    'class'=>'yii\log\FileTarget',
                    'levels'=>['warning'],
                    'logFile'=>'@runtime/logs/'.date(Ymd).'/warning/'.date(d).'.log',
                ],

            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        //basePath和baseUrl分别是对资源的目录和资源的url进行配置
        'view'=>[
            'theme'=>[
                'pathMap'=>[
                    '@app/views'=>[
                        '@app/themes/spring',
                    ],
                ],
            ],
        ],

        'assetManager'=>[
          'bundles'=>[
              'dmstr\web\AdminLteAsset'=>[
                  'skin'=>'skin-blue',
              ],
          ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
          //  'suffix' => '.html',
            'rules' => [
            ],
        ],


        /**
         * 自定义组件
         * @plog  后台操作日志
         */
        'plog'=>[
            'class'=>'backend\components\Log',
        ],
        'helper'=>[
            'class'=>'common\components\Helper',
        ],


    ],
//    'as myBehavior2' =>  MyBehavior::className(),
    'params' => $params,
];
