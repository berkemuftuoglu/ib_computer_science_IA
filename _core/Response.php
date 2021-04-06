<?php
namespace _core;

class Response {
	private $server;
	private $post;

	function __construct(){
		$this->server=$_SERVER;
	}

	public function ReadUrl($rows1=NULL){
         $rows1=$rows1+1;
	  	if(!$rows1)
            return $this->server["REQUEST_URI"];
	  	else
	  	    return explode("/",$this->server["REQUEST_URI"])[$rows1];
	}

    function SiteInfo(){         
        if($_SERVER['HTTP_HOST']=='localhost')         
        {            
            $Result['url']='http://localhost/doktor';             
            $Result['tasarim']='http://localhost/doktor/Tasarim';          
        } else {          

        }           
        $Result['title']='Doktor ';  	    
        return $Result;     
    }

    function SearchUrl($word)
    {
        if(strpos($_SERVER["REQUEST_URI"], $word)) return '1' ;
    
        $Result['title']='Doktor ';

	    return $Result;
    }
    public function Modul(){

        $Include='Modul/'.$Request=$this->ReadUrl(1).'/_m.php';
        if(file_exists($Include)) require_once($Include);

    }
    public function Method(){

        return $this->server['REQUEST_METHOD'];

    }

    public function Post($data){
        return strip_tags($_POST[$data]);
    }

    public function _Post($Data=NULL){
        if(!$Data) $Data=$this->post;

        foreach($Data as $key => $value){
            if(is_array($value)) $rt[$key]=$this->_Post($value); else $rt[$key]=strip_tags($value);
        };
        return $rt;
    }



    public function ValidateMail($email){

        $buMail=filter_var($email, FILTER_VALIDATE_EMAIL);
        if($buMail){
            $server= substr($email,strpos($email,'@')+1);
            $result= array();
            getmxrr($server,$result);
        }
        return count($result);

    }


    function Session($name,$value=NULL){
        if($value) $_SESSION[$name] = $value; else return @$_SESSION[$name];
        if($value=='sil') unset($_SESSION[$name]);

    }

    function IpAddress(){
        if(getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
            if (strstr($ip, ',')) {
                $tmp = explode (',', $ip);
                $ip = trim($tmp[0]);
            }
        } else {
            $ip = getenv("REMOTE_ADDR");
        }
        return $ip;
    }
}
