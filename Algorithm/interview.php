<?php
/*
    微店的一道面试题
    任意一个整型数组 有奇数有偶数元素 要求处理后的
    数组 奇数在左边 偶数在右边
 */
$arrTest = array(23,7,4,3,2,9,90,456,3459,6,10);

function fuckArr($arr){
	if(!is_array($arr)) return false;
	$tempArr = array();                         //临时数组变量
	foreach($arr as $value){
		if($value % 2 == 0){
			array_push($tempArr,$value);	    //在数组的尾部插入一个元素
		}else{
			array_unshift($tempArr, $value);	//在数组的首部插入一个元素
		}
	}
	return $tempArr;
}
$arrTest = fuckArr($arrTest);
echo "<pre>";
var_dump($arrTest);


/*
    糯米网
    关于数据表优化，有一个人员信息表，大概有1000W行，有个字段是"入*申请书"，该字段大概要10+K,假如我想获取这个字段的内容，
    该如何优化这张表。 
    读写分离 索引 先垂直分表 再水平分表 

*/

/*
	糯米网的一道面试题
	已知:
	$a = '/a/b/c/d/e.php';
	$b = '/a/b/13/14/c.php';

	两个目录 现在求$b相对于$a的相对路径

	以前的有点错误  今天重新看了这道题 修改过来
*/
function getRelativePath($a,$b){
    $a2array = explode("/", dirname($a)); //取出目录名
    $b2array = explode("/", dirname($b));
    for ($i=0, $len = count($b2array); $i < $len; $i++) { 
    	if($a2array[$i] != $b2array[$i]){
    		break;
    	}
    }
    //不在同一个根目录
    if($i == 1){
    	$return_path = array();
    }
    //在同一个根目录
    if($i!=1 && $i < $len){
    	$return_path = array_fill(0, $len - $i, '..');
    }
    //在同一个目录下
    if($i == $len){
    	$return_path = array('./');
    }

    $return_path = array_merge($return_path, array_slice($a2array, $i));
    return implode('/', $return_path);
}
$tmp =  getRelativePath("/a/b/c/d/e.php", "/a/b/13/14/c.php");
print_r($tmp);
