<?php
/*
 * @file domain_check.addon.php
 * @brief 도메인 체크 애드온
 *
 * 원하는 도메인으로 통일할 수 있도록 합니다.
 * **/

// XE안에서만 작동, called_position이 before_module_init일때만 실행, 관리자모드에서 작동 안하기
if(!defined("__ZBXE__")) exit();
if($called_position != 'before_module_init' || Context::get('module')=='admin') return;
if($addon_info->except_domain==$_SERVER[HTTP_HOST]) return;

 /* 원하는 도메인으로만 접속하게 처리하고자 할 때 */ 
if ($addon_info->my_domain!=null){
    if ($_SERVER[HTTP_HOST]!="$addon_info->my_domain"){
        header("location:http://$addon_info->my_domain".$_SERVER['REQUEST_URI']);
    }
}