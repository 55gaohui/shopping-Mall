<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;
class Systemlist extends Model
{
    //所有删除执行 软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //查询 分类 父类栏目
    public function getfirstcategory() {
        $data = [
            'status'=>1,
            'parent_id'=>0
        ];
        $order = [
            'order'=> 'asc',
            'id' => 'desc'
        ];
        return $this->where($data)->order($order)->select();
    }
    //处理添加功能 上传的数据
    public function savelist($data = []){
        $result = $this->allowField(true)->save($data);
        if($result){
            return $this->getData('id');
        }else{
            return false;
        }
    }

}