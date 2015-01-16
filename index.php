<?php  
header("Content-type:text/html;charset=utf-8");
require_once('wechat.php');
$appid='wx068aede1bc1be5b9';
$appsecret='f202ac26b747a93bdd0a9fc5275a1a89';
$wechatObj=new GtWechatApi($appid,$appsecret);
//$res=$wechatObj->getmenu();
$data='{"button":[{"name":"个人信息","sub_button":[{"type":"view","name":"注册古太网络","url":"http://www.gt-net.cn/user/register","sub_button":[]},{"type":"view","name":"绑定微信","url":"http://www.gt-net.cn/user/login","sub_button":[]},{"type":"view","name":"服务报价","url":"http://www.gt-net.cn","sub_button":[]}]},{"name":"线上互动","sub_button":[{"type":"view","name":"心愿树","url":"http://www.gt-net.cn","sub_button":[]}]},{"name":"我的应用","sub_button":[{"type":"click","name":"自制电子贺卡","key":"fn_app_card","sub_button":[]}]}]}}{"menu":{"button":[{"name":"个人信息","sub_button":[{"type":"view","name":"注册古太网络","url":"http://www.gt-net.cn/user/register","sub_button":[]},{"type":"view","name":"绑定微信","url":"http://www.gt-net.cn/user/login","sub_button":[]},{"type":"view","name":"服务报价","url":"http://www.gt-net.cn","sub_button":[]}]},{"name":"线上互动","sub_button":[{"type":"view","name":"心愿树","url":"http://www.gt-net.cn","sub_button":[]}]},{"name":"我的应用","sub_button":[{"type":"click","name":"自制电子贺卡","key":"fn_app_card","sub_button":[]}]}]}';

$res=$wechatObj->setmenu($data);
echo '<hr>';
//var_dump($res);
echo '<hr>';
var_dump($wechatObj);



/*------------------------*\
fn:getmenu 
result:menu 
return:string

fn:setmenu(menu)
result:result
return:boolean

\*------------------------*/

?>
<!-- 
服务号：
$appid='wx068aede1bc1be5b9';
$appsecret='f202ac26b747a93bdd0a9fc5275a1a89'; 
-->