<?php

/**
 * Created by PhpStorm.
 * User: Mario
 * Date: 30/01/2016
 * Time: 20:39
 */
namespace Tmwk\CpanelUapiBundle\Lib\Component;

class Parse extends Collector
{

    protected function execute($url, $parameters = array(), $type = 'cpanel')
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        if($type === 'cpanel') {
            $header[0] = "Authorization: Basic " . base64_encode($this->getCpanelUser() . ":" . $this->getCpanelPassword()) . "";
        }elseif($type === 'whm') {
            $header[0] = "Authorization: Basic " . base64_encode($this->getWhmUser() . ":" . $this->getWhmPass()) . "";
        }else{
            error_log("Invalid parameter type");
            return false;
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_POSTFIELDS, http_build_query($parameters));

        $result = curl_exec($curl);
        if ($result == false) {
            error_log("curl_exec threw error \"" . curl_error($curl) . "\" for {$url}".http_build_query($parameters));
        }
        curl_close($curl);

        return $result;
    }

    public function generateUrl($function, $action)
    {
        $url = 'https://' . $this->getCpanelHost() . ':2083/' . $this->getCpanelToken() . '/execute/'.$function.'/'.$action;
        return $url;
    }
}