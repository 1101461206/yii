<?php

namespace backend\components;

use backend\models\UserPermissionRelation;
use common\models\User;
use Yii;
/**
 * 左侧菜单栏
 */
class MenuHelper
{
    public static function getAssignedMenu()
    {
        $user_info = Yii::$app->user->identity;
        $userrole = new UserPermissionRelation();
        $info = $userrole->menu($user_info->role);
        $cache_id="role".$user_info->role;
        $cache=Yii::$app->cache;
        $menu=$cache->get($cache_id);
       // $menu=false;
        if($menu===false) {
            $menu = array();
            foreach ($info as $k => $v) {
                $menu[$v['permission_id']] = array(
                    'label' => $v['permission_name'],
                    'icon' => '',
                    'url' => $v['permission_route'] ? $v['permission_route'] : '#',
                );
               if(!empty($v['list'])) {
                   if (count($v['list'] > 0)) {
                       foreach ($v['list'] as $kk => $vv) {
                           $menu[$v['permission_id']]['items'][] = array(
                               'label' => $vv['permission_name'],
                               'icon' => '',
                               'url' => $vv['permission_route'] ? [$vv['permission_route']] : '#',
                           );
                       }
                   }
               }
            }
            $cache->set($cache_id,$menu);
        }
        return $menu;
    }
}