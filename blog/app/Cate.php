<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    public function test($a=0,&$result=array()){
        $a++;
        if ($a<10) {
          $result[]=$a;
          self::test($a,$result);
        }
        echo $a;
        return $result;
     
    }
	public function getTree($data, $pId)
		{
		    $tree = [];
		    foreach($data as $k => $v)
		    {
		    	// echo '<pre>';
		    	// var_dump($data);
		    	// die;
		        if($v['children'] == $pId)
		        {         //父亲找到儿子
		            $v['children'] = self::getTree($data, $v['value']);
		            $tree[] = $v;
		            //unset($data[$k]);
		        }
		    }
		    return $tree;
		}
	// public function getName($data,)
	// {
	//     $tree = '';
	//     foreach($data as $k => $v)
	//     {
	//         if($v['pid'] == $pId)
	//         {         //父亲找到儿子
	//             $v['pid'] = self::getTree($data, $v['id']);
	//             $tree[] = $v;
	//             //unset($data[$k]);
	//         }
	//     }
	//     return $tree;
	// }
	public function object1array($object) {
	  if (is_object($object)) {
	    foreach ($object as $key => $value) {
	    	// var_dump($value);
	    	// die;
	      $array[$key] = $value;
	    }
	  }
	  else {
	    $array = $object;
	  }
	  return $array;
	}
	public function object2array($object) {
	  if (is_object($object)) {
	    foreach ($object as $key => $value) {
	    	// var_dump($key);
	    	// die;
	    	// if($k!='id')
	    	if($key!="path" && $key!="paths" && $key!="status"){
	      		// $array[$key] = $value;
	      		$array[$key] = $value;
	    	}
	    }
	  }
	  else {
	    $array = $object;
	  }
	  return $array;
	}
 //  function array2object($array) {
	//   if(is_array($array)) {
	//     $obj = new StdClass();
	//     foreach ($array as $key => $val){
	//       $obj->$key = $val;
	//     }
	//   }else { $obj = $array; }
	//   return $obj;
	// }
}