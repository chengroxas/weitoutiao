<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
   protected $_validate = array(
		array('title','require','博文标题必须填'), 
		array('type','require','博文类别必须填'),
		array('author','require','作者必须填'),
		array('introduce','require','博文简介必须填'),
		array('content','require','博文内容必须填'),
   );
}
