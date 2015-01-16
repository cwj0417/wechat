<?php 

class GtWechatApi{
	private $appid='';
	private $appsecret='';
	private $accesstoken='';
	function __construct($id,$key){
		$this->appid=$id;
		$this->appsecret=$key;
		$this->gettoken();
	}
	function gettoken(){
		$m=new memcache;
		$m->connect('localhost',11211) or die('could not connect to memcached');
		$tmp=$m->get('accesstoken');
		if($tmp){
			$this->accesstoken=$tmp;
		}else{
			$url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appid.'&secret='.$this->appsecret;
		$res=json_decode(file_get_contents($url));
		$m->set('accesstoken',$res->access_token,0,7200);
		$this->accesstoken=$res->access_token;
		}
		
	}
	public function getmenu(){
		$url='https://api.weixin.qq.com/cgi-bin/menu/get?access_token='.$this->accesstoken;
		$res=file_get_contents($url);
		return $res;
	}
	public function setmenu($data){
		$url='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->accesstoken;
		$this->curlPost($url,$data);
	}
	function curlPost($url,$data){
		$c=curl_init();
		curl_setopt($c,CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($c,CURLOPT_RETURNTRANSFER, 0);
		curl_setopt($c,CURLOPT_POST,1);
		curl_setopt($c,CURLOPT_POSTFIELDS,$data);
		$res=curl_exec($c);
		curl_close($c);
		echo '<hr>';
		return $res;
	}
}

 ?>