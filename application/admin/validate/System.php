<?php


namespace app\admin\validate;
use think\Validate;

class System extends Validate
{
    protected  $rule = [
        'name' => 'require|max:25',
        'parent_id' => 'number'
    ];
    protected  $msg = [
        'name.require' => '名称必须填写！',
        'name.max' => '名称长度不能超过25位！',
        'parent_id' => '非法更改栏目信息！',
    ];
}