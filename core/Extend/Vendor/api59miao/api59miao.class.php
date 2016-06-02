<?php
/**
 * Api59miao
 * 
 * @author 59miao.com
 * QQ:554024292
 *
 */
class Api59miao
{
	protected $_api_url = '';
	
	protected $_setting = Array();
	
	protected $_params = null;
	
	protected $_url = '';
	protected $_sign_str = '';
	
	protected $_retData = '';
	protected $_ArrayData = null;
	protected $method='';
	protected $fields='';
	public $Cache;	
	
	/**
	 * 构造函数
	 * @param Array $setting Api设置，包括 appKey, appSecret,api_url等
	 */
	public function __construct($setting = Array())    //说明缓存时间默认为1天
	{
		foreach($setting as $key => $val)
		{
			$this->_setting[$key] = $val;
		}
		$this->_api_url=APIURL;	

		$this->Cache=new Api59miao_Cache();
		$this->Cache->setClearCache(API_CACHETIME);  //设置缓存时间
	}
	/*广告调用工具*/
	public function AdsGet($sids,$pic_size,$fields){
		if(empty($fields)){
			$fields = 'click_url,pic_size,pic_url,ad_id,sid,sids,pic_size,title';
		}
		$method = '59miao.ads.get';				
		$params['sids']=$sids;	
		$params['pic_size']=$pic_size;
		return $this->apiCall($method, $fields, $params);	
	}
	/*
	 * 收入报表数据结构(59miao.orders.report.get) 
	 * 名称 	类型 	是否隐私 	示例值 	描述
		order_id 	Number 	否 	  	订单编号
		seller_id 	Number 	否 	  	商家编号
		seller_name 	String 	否 	  	商家名称
		app_key 	Number 	否 	  	应用编号
		created 	String 	否 	  	下单时间
		order_amount 	String 	否 	  	订单金额
		commission 	String 	否 	  	收入 
	 * */	
	public function ListOrderReport($date){	
		$method = '59miao.orders.report.get';
		$fields = 'order_id,seller_id,seller_name,app_key,created,order_amount,commission,status,outer_code';
		$params['app_key'] = $this->_setting['appKey'];
		$params['date']=$date;	
		return $this->apiCall($method, $fields, $params);	
		
	}
	
	/**
	 * 查询商家列表API (59miao.shops.list.get) 
	 * @param Array $params 传入参数
	 * @return Array
	 */
	public function ListShopListGet($fields=null,$params = Array())
	{
		$method = '59miao.shops.list.get';
		if(!$fields){
			$fields = 'sid,name,desc,shop_cat,logo,created,modified,click_url,cashback,payment,shipment,shipment_fee,cash_ondelivery,freeshipment,installment,has_invoice,status';
		}		
		return $this->apiCall($method, $fields, $params);
	}
	
	/**
	 * 商家分类(59miao.shopcats.get)
	 * @param Array $params 调用api参数
	 * @return Array
	 */
	public function ListShopCatsGet($fields=null,$params = Array())
	{
		$method = '59miao.shopcats.get';
		if(!$fields){
		$fields = 'cid,name,count,status,sort_order';
		}
		return $this->apiCall($method, $fields, $params);
	}
	//商品类别由父类获取子类的方法
	public function ListItemCatsGet($fields=null,$params = Array())
	{
		$method = '59miao.itemcats.get';	
		if(!$fields){
			$fields = 'cid,parent_cid,name,is_parent,status';
		}		
		if(!isset($params['cids']))
		{
			$params['parent_cid'] = '0';
		}
		else{
			$params['parent_cid'] = $params['cids'];
		}	
		$params['cids']='';    //重新设置cids的值为空
		return $this->apiCall($method, $fields, $params);
	}
	public function getItemCat($cid)
	{
		$params = Array('cids' => $cid);
		
		return $this->ListItemCatsGet('',$params);
	}
	
	
	//商品类别由子类获取父类的方法  
	public function listItemCatsParent($params = Array())
	{
		$method = '59miao.itemcats.get';
		$fields = 'cid,parent_cid,name,is_parent,status';		

		return $this->apiCall($method, $fields, $params);
	}
	
	public function getItemCatParent($cid)
	{
		$params = Array('cids' => $cid);
		
		return $this->listItemCatsParent($params);
	}
	/**
	 * 查询商品列表(59miao.items.search) 
	 * @param unknown_type $params
	 */
	public function searchItems($fields,$params = Array())
	{
		$method = '59miao.items.search';				
		return $this->apiCall($method, $fields, $params);
	}
	
	public function ListItemsSearch($fields=null,$keyword, $cid = null, $sid = null, $page_no = 1, $page_size = 40,$star_price=null,$end_price=null,$sort=null)
	{
		$params = Array(
			'page_no' => $page_no,
			'page_size' => $page_size,
			//'sort' => 'modified_desc',
		);
		if(!$fields){
			$fields = 'iid,click_url,seller_url,title,sid,seller_name,popular,cid,desc,pic_url,price,cash_ondelivery,freeshipment,installment,has_invoice,modified,price_reduction,price_decreases,original_price';
		}
		if($keyword)
		{
			$params['keyword'] = $keyword;
		}
		if($cid)
		{
			$params['cid'] = $cid;
		}
		if($sid)
		{
			$params['sid'] = $sid;
		}	
		if(isset($star_price) && isset($end_price) && $star_price<=$end_price){
			$params['start_price']=$star_price;
			$params['end_price']=$end_price;
		}	
		if(isset($sort)){
			$params['sort'] = $sort;
		}
		//$params['seller_cids']='211,2232';
		return $this->searchItems($fields,$params);
	}
	
	/**
	 * 查询商品详细(59miao.items.get)	
	 * 
	 * @param $iids 要查询的商品ID，多个用逗号隔开
	 * @param $fields
	 * @param $outer_code
	 */
	public function ListItemsDetail($iids='',$urls='', $fields = null, $outer_code = '')
	{
		$method = '59miao.items.get';
		if(!$fields)
		{
			$fields = 'iid,click_url,seller_url,title,sid,seller_name,cid,desc,pic_url,price,cash_ondelivery,freeshipment,installment,has_invoice,modified,price_reduction,price_decreases,original_price';
		}
		if(!empty($iids)){
			$params = Array(
				'iids' => $iids,
				
			);
		}
		if(!empty($urls)){
			$params = Array(
				'urls' => $urls,
				
			);
		}

		if($outer_code)
		{
			$params['outer_code'] = $outer_code;
		}
		
		return $this->apiCall($method, $fields, $params);
	}
	
	/**
	 * 查询商家详细(59miao.shops.get)	
	 * 
	 * @param $sids 要查询的商家ID，多个用逗号隔开
	 * @param $fields
	 * @param $outer_code
	 */
	public function ListShopsDetail($sids, $fields = null, $outer_code = '')
	{
		$method = '59miao.shops.get';
		if(!$fields)
		{
			$fields = 'sid,name,desc,shop_cat,logo,created,modified,click_url,cashback,payment,shipment,shipment_fee,cash_ondelivery,freeshipment,installment,has_invoice,status';
		}
		
		$params = Array(
			'sids' => $sids,
			
		);
		if($outer_code)
		{
			$params['outer_code'] = $outer_code;
		}
		
		return $this->apiCall($method, $fields, $params);
	}
	
	/**
	 * 查询商家促销分类(59miao.promocats.get)
	 * 
	 * @param $parent_cid
	 * @param $cids
	 * 
	 * @return Array
	 * 
	 */
	public function ListPromoCats($fields=null,$cids = null)
	{
		$method = '59miao.promocats.get';		
		if(!$fields){
			$fields = 'cid,parent_cid,name';
		}
		$params = Array();		
		if($cids!=null)
		{
			$params['parent_cid'] = $cids;
		}		
		else
		{
			$params['parent_cid'] = '0';
		}
		
		return $this->apiCall($method, $fields, $params);
	}
	public function ListCurentPromoCats($fields=null,$cids = null)
	{
		$method = '59miao.promocats.get';		
		if(!$fields){
			$fields = 'cid,parent_cid,name';
		}
		$params = Array();		
		if($cids!=null)
		{
			$params['cids'] = $cids;
		}		
		
		
		return $this->apiCall($method, $fields, $params);
	}

	/**
	 * 查询商家促销列表(59miao.promos.list.get )
	 */
	public function ListPromosListGet($fields=null,$sids = null, $cids = null, $page_no = 1, $page_size = 20, $outer_code = null)
	{
		$method = '59miao.promos.list.get';
		if(!$fields){
			$fields = 'pid,title,click_url,seller_logo,start_time,end_time,sid,seller_name,seller_url,pic_url_1,pic_url_2,pic_url_3';
		}
				
		$params = Array(
			'page_no' => $page_no,
			'page_size' => $page_size,
		);
		
		if($sids)
		{
			$params['sids'] = $sids;
		}
		if($cids)
		{
			$params['cids'] = $cids;
		}
		
		if($outer_code)
		{
			$params['outer_code'] = $outer_code;
		}	
		return $this->apiCall($method, $fields, $params);
	}
	//促销活动详情	
	public function ListPromoDetail($pids,$fields=null)
	{
		$method = '59miao.promos.get';		
		if(!$fields){
			$fields = 'pid,title,click_url,seller_logo,start_time,end_time,sid,seller_name,seller_url,pic_url_1,pic_url_2,pic_url_3';
		}
		$params = Array();		
		if($pids!=null)
		{
			$params['pids'] = $pids;
		}		
		
		
		return $this->apiCall($method, $fields, $params);
	}
	
	//获取商家促销详情
	
	
	/**
	 * Api调用
	 * @param String $method
	 * @param String $fields
	 * @param Array $params
	 */
	protected function apiCall($method, $fields, $params)
	{	
			$cacheid= md5($method.$fields.implode(" ",$params));  //缓存id			
			$this->Cache->setMethod($method);     //设置method
			//如果不存在文件 则调用远程数据
			 if (! $this->_ArrayData = $this->Cache->getCacheData($cacheid)) {
			 				 	
				 	$default = Array(
					'method' => $method,
					'timestamp' => Date('Y-m-d H:i:s'),
					'format' => 'xml',
					'app_key' => $this->_setting['appKey'],
					'v' => '1.0',
					'sign_method' => 'md5',
					'fields' => $fields,
					);		
				$this->_params = Array_Merge($default, $params);
				$this->_retData = $this->send($this->_params);				
				//编码转换					
				$this->_retData=Api59miao_Toos::Format59miaoData($this->_retData);			
				$this->_ArrayData = Api59miao_Toos::getXmlData($this->_retData);		
				$this->_ArrayData=Api59miao_Toos::get_object_vars_final_coding($this->_ArrayData);
				$this->_ArrayData=Api59miao_Toos::Serialize($this->_ArrayData); //序列化		
				$this->Cache->saveCacheData($cacheid, $this->_ArrayData);
			 }		
			return Api59miao_Toos::UnSerialize($this->_ArrayData);	
		
	}
	/**
	 * 通过HTTP发送Api请求
	 * @param Array $params
	 */
	protected function send($params)
	{
		ksort($params);
		$url = $this->_api_url;
		$str = $this->_setting['appSecret'];
		foreach($params as $key => $val)
		{
			if($key == '' || $val == '')
			{
				continue;
			}
			$url .= $key . '=' . UrlEncode($val) . '&';
			
			$str .= $key . Api59miao_Toos::Convert_Encoding($val);
		}
		$this->_sign_str = $str;
		$sign = md5($str);
		//$sign = $this->createSign($params, $this->_setting['appSecret']);
		$sign = Api59miao_Toos::createSign($params, $this->_setting['appSecret']);
		$url .= 'sign=' . $sign;		
		$xmlStr=Api59miao_Toos::vita_get_url_content($url);        
		return $xmlStr;
	}
}

