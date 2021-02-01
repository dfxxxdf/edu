<?php
  header("Content-type:text/html;charset=utf-8");    //设置编码
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "edu";
  // 创建连接
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  mysqli_set_charset($conn,'utf8'); //设定字符集
  // 检测连接
  if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
  }
  // 使用 sql 创建数据表
  $sql = "CREATE TABLE user (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT '用户名ID',
  `name` varchar(50) NOT NULL COMMENT '用户名',
    `password` varchar(32) NOT NULL COMMENT '用户登录密码',
    `email` varchar(255) NOT NULL COMMENT '用户邮箱',
    `create_time` INT(11) NOT NULL COMMENT '创建时间',
    `update_time` INT(11) NOT NULL COMMENT '创建时间'
  )ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
  if (mysqli_query($conn, $sql)) {
    echo "数据表 user 创建成功";
  } else {
    echo "创建数据表错误: " . mysqli_error($conn);
  }
  mysqli_close($conn);
?>
