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
	public function base58_encode($string)
    {
        $alphabet = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $base = strlen($alphabet);
        if (is_string($string) === false) {
            return false;
        }
        if (strlen($string) === 0) {
            return '';
        }
        $bytes = array_values(unpack('C*', $string));
        $decimal = $bytes[0];
        for ($i = 1, $l = count($bytes); $i < $l; $i++) {
            $decimal = bcmul($decimal, 256);
            $decimal = bcadd($decimal, $bytes[$i]);
        }
        $output = '';
        while ($decimal >= $base) {
            $div = bcdiv($decimal, $base, 0);
            $mod = bcmod($decimal, $base);
            $output .= $alphabet[$mod];
            $decimal = $div;
        }
        if ($decimal > 0) {
            $output .= $alphabet[$decimal];
        }
        $output = strrev($output);
        foreach ($bytes as $byte) {
            if ($byte === 0) {
                $output = $alphabet[0] . $output;
                continue;
            }
            break;
        }
        return (string) $output;
    }
    public function base58_decode($base58)
    {
        if (is_string($base58) === false) {
            return false;
        }
        if (strlen($base58) === 0) {
            return '';
        }
        $indexes = array_flip(str_split($this->alphabet));
        $chars = str_split($base58);
        foreach ($chars as $char) {
            if (isset($indexes[$char]) === false) {
                return false;
            }
        }
        $decimal = $indexes[$chars[0]];
        for ($i = 1, $l = count($chars); $i < $l; $i++) {
            $decimal = bcmul($decimal, $this->base);
            $decimal = bcadd($decimal, $indexes[$chars[$i]]);
        }
        $output = '';
        while ($decimal > 0) {
            $byte = bcmod($decimal, 256);
            $output = pack('C', $byte) . $output;
            $decimal = bcdiv($decimal, 256, 0);
        }
        foreach ($chars as $char) {
            if ($indexes[$char] === 0) {
                $output = "\x00" . $output;
                continue;
            }
            break;
        }
        return $output;
    }
    public function update_tables($table_name,$ziduanming,$update_content){
    		$a='123';
    		return $a;
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
