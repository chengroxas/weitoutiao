<?php
namespace Admin\Model;
use Think\Model;
class TypeModel extends Model{
   protected $_validate = array(
     array('arttype','require','文章类别必须填写'), // 用户名必须
     array('arttype','','文章类别已存在',1,'unique',1), // 验证用户名是否已经存在
   	 array('artnum','require','排序数字必须填写'), // 排序数字必须填写
     array('artnum','','排序数字已存在',1,'unique',1), // 验证排序数字是否已经存在
   );
}
