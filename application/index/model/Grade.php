<?php

namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class Grade extends Model
{
    //引用软删除方法集
    use SoftDelete;

    //设置当前表(Grade表)默认日期时间显示格式
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

    // 定义自动完成的属性
  /**
   * 当我们往前数据表(Grade)中插入数据的时候，status会默认插入数值1
   */
    protected $insert = ['status' => 1];

    // 定义关联方法
    public function teacher(){
      /**
       * 班级表(当前表Grade)与教师表(Teacher)是1对1关联
       * 一个班只由一个老师负责，一个老师也只教一个班(这就是传说中的一对一)
       */
        return $this->hasOne('Teacher');
    }
        // 定义关联方法

  /**
   * 班级(当前表Grade)与学生(Student)是1对多关联
   * 一个班对应着多个学生，多个学生对应着一个班级(这就是传说中的一对多)
   */
    public function student(){
        return $this->hasMany('student');
    }
}
