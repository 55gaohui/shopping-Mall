<?php
/**
 * Created by PhpStorm.
 * User: gaohui
 * Date: 2019/5/7
 * Time: 4:46 PM
 */

namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index(){
        return $this->fetch();
    }
    public function content(){
        return $this->fetch();
    }
}