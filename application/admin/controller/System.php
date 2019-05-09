<?php
/**
 * Created by PhpStorm.
 * User: gaohui
 * Date: 2019/5/8
 * Time: 3:26 PM
 */

namespace app\admin\controller;

use think\Controller;
class System extends Controller
{
    public function index(){
        return $this->fetch();
    }
}