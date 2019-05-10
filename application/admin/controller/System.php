<?php
/**
 * Created by PhpStorm.
 * User: gaohui
 * Date: 2019/5/8
 * Time: 3:26 PM
 */

namespace app\admin\controller;

use think\Controller;
use app\common\model\Systemlist;
use think\Validate;
class System extends Controller {

    public function index(){
        return $this->fetch();
    }
    public function listadd(){
        $list = new Systemlist;
        $firstcategory = $list->getfirstcategory();
        $this->assign('firstcategory',$firstcategory);
        return $this->fetch();
    }
    //接收 添加功能 传值
    public function categorysave(){
        //接收数据
        $data=$this->request->param();
        //验证数据
//        dump($data);
        $validate =validate('System');
        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }

        $result = model('Systemlist')->savelist($data);
        if ($result){
            $this->success('保存成功！');
        }else{
            $this->error('保存失败，请重试！');
        }
    }
}