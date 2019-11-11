<?php
namespace intheroadstill;

Class http{
    /**
     * curl模拟get进行 http 或 https url请求(可选cookie)
     * string $url
     * bool $type=true or $type=false //请求类型：true为http请求,false为https请求
     */
    function get($url,$cookie="",$type=false) {//type与url为必传 cookie为选传

        if (empty($url)) {
            return false;
        }

        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        if(!empty($cookie))curl_setopt($ch,CURLOPT_COOKIE,$cookie);  //设置cookie
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        return $data;
    }

    /**
     * curl模拟post进行 http 或 https url请求(可选携带表单,cookie)
     * string $url
     * string $cookie
     * array $post_data
     * $post_data = array("key1"=>"value1","key2"=>"value2")  //表单以数组类型传输
     * bool $type=true or $type=false //请求类型：true为http请求,false为https请求
     */
    function post($url, $post_data, $cookie="", $type=false) {//type与url为必传  ,表单post_data数组,和cookie字符串选传
        if (empty($url)) {
            return false;
        }
        if(!empty($post_data)){
            $params = '';
            foreach ( $post_data as $k => $v )
            {
                $params.= "$k=" . urlencode($v). "&" ;
            }
            $params = substr($params,0,-1);
        }
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        if(!empty($cookie))curl_setopt($ch,CURLOPT_COOKIE,$cookie);  //设置cookie
        if(!empty($post_data))curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //设置表单
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        return $data;
    }
}