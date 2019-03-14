<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    const SEX_UN = 10;  //未知
    const SEX_BOY = 20; // 男
    const SEX_GRIL = 30;    //女

    //设置表名
    protected $table = 'student';
    //create方法设置批量赋值
    protected $fillable = ['name', 'age', 'sex'];

    //设置自动维护时间戳
    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();//返回值调用时间函数
    }

    //设置更新的时间
    protected function asDateTime($val)
    {
        return $val;
    }

    public function sex($ind = null)
    {
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GRIL => '女',
        ];

        if ($ind !== null) {
            //array_key_exists()判断k是否存在
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }


}