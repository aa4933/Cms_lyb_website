<?php
/**
 * Api Toos 工具类
 * 
 * @author 59miao.com
 * QQ:554024292
 *
 */
class Api59miao_Toos
{    	//获取数据兼容file_get_contents与curl
		static public function vita_get_url_content($url) {
			if(function_exists('file_get_contents')) {
				$file_contents = file_get_contents($url);
			} else {
			$ch = curl_init();
			$timeout = 5; 
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			   curl_close($ch);
			}
			return $file_contents;
		}
		
		//签名函数 
		static public function createSign ($paramArr,$appSecret) 
		{ 
		    $sign = $appSecret; 
		    ksort($paramArr); 
		    foreach ($paramArr as $key => $val) 
		    { 
				if ($key !='' && $val !='')
				{
					$sign .= $key . self::Convert_Encoding($val);
				} 
		    }
		   // $this->_sign_str = $sign;
		    $sign = strtoupper(md5($sign));
		    return $sign; 
		}	
		//组参函数 
		static public function createStrParam ($paramArr) { 
		    $strParam = ''; 
		    foreach ($paramArr as $key => $val) { 
		       if ($key != '' && $val !='') { 
		           $strParam .= $key.'='.urlencode($val).'&'; 
		       } 
		    } 
		    return $strParam; 
		} 
	
		//解析xml函数
		static public function getXmlData ($strXml) {
			$pos = strpos($strXml, 'xml');
			if ($pos) {
				$xmlCode=simplexml_load_string($strXml,'SimpleXMLElement', LIBXML_NOCDATA);
				$arrayCode=self::get_object_vars_final($xmlCode);
				return $arrayCode ;
			} else {
				return '';
			}
		}	
		//对象属性组成的关联数组		
		static public function get_object_vars_final($obj){
			if(is_object($obj)){
				$obj=get_object_vars($obj);
			}
			if(is_array($obj)){
				foreach ($obj as $key=>$value){
					$obj[$key]=self::get_object_vars_final($value);
				}
			}
			return $obj;
		}	
		//编码转换
		
		 static public function get_object_vars_final_coding ($obj)
		    {
				foreach($obj as $key => $value)
				{
					if(is_array($value))
					{
						$obj[$key] = self::get_object_vars_final_coding($value);
					}else{
						$obj[$key] = self::Format59miaoData($value);
					}
				}
		        return $obj;
		    }
		/*
		 * 转换编码函数
		 * @return var
		 * var 要转换的内容
		 * Charset 原编码格式 
		 * 
		 * */		
		static public function Convert_Encoding($val)
		{			
			if(function_exists('mb_convert_encoding'))
			{
			   $val=mb_convert_encoding($val, 'GBK', 'UTF-8');
					   
			}elseif(function_exists('iconv'))
			{
			   $val = @iconv('UTF-8','GBK',$val);			
			}		
		
			return $val;
		}
		//序列化函数
		static public function Serialize($array){
			return serialize($array);
		}
		//反序列化函数
		static public function UnSerialize($array){
			return unserialize($array);
		}
		//压缩函数
		static public function Gzcompress($data){
			return gzcompress($data,9);
		}
		//解压函数
		static public function Gzuncompress($data){
			return gzuncompress($data);
		}
		//获取AppKey 函数
		static public function GetAppkeySecret($appkey,$appsecret){
			$m_mallsets=array(										//关联数组
				'appKey'=>$appkey,									
				'appSecret'=>$appsecret
			);
			return $m_mallsets;
		}
		//编码转换解析
		static public function Format59miaoData($data)
		{
			if(strtoupper(CHARSET) != 'UTF-8')
			{
				if(function_exists('mb_convert_encoding'))
				{
					$data = str_replace('utf-8',CHARSET,$data);					
					$data = @mb_convert_encoding($data,CHARSET,'UTF-8');
				}elseif(function_exists('iconv'))
				{
					$data = str_replace('utf-8',CHARSET,$data);
					$data = @iconv('UTF-8',CHARSET,$data);
				}
			}
	
			return $data;
		}	
	
}