<?php

namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class Student  extends Model
{
    //引用软删除方法集
    use SoftDelete;

    //设置当前表(Student)默认日期时间显示格式
    protected $dateFormat = 'Y/m/d';

    //定义表中的删除时间字段,来记录删除时间
    protected $deleteTime = 'delete_time';

    /**
     * 开启自动写入时间戳
     * 无论是新增还是更新都会蒋当前的时间填入到表中的两个字段(create_time、update_time)中
     */
    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time';

    protected $updateTime = 'update_time';

    protected $type = [
        'start_time'=>'timestamp',
    ];


    public function getSexAttr($value)
    {
        $sex = [
            0=>'女',
            1=> '男'
        ];
        return $sex[$value];
    }
// 定义与学生表student的一对多关联
    public function grade(){
        return $this->belongsTo('grade');
    }
}
