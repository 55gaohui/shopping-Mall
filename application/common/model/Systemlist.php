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
    //分类列表获取
    public function getlist(){
        $field = 'id,name,parent_id,order,link';
        $where['status'] = 1;
        $order['order'] = 'asc';
        $data = $this->field($field)
            ->where($where)
            ->order($order)
            ->select();
        return $this->tree($data);
    }
    /*
     * 递归 分类列表
     */
    public function tree($data, $name = 'child', $parent_id = 0){
        $arr = array();
        foreach ($data as $key=>$value){
            if ($value['parent_id'] == $parent_id ){
                $arr[] = $value;
                $value[$name] = $this->tree($data,$name, $value['id']);
            }
        }
        dump($arr);
        return $arr;
    }
}