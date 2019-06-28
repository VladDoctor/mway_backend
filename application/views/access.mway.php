<?php

session_start();

interface guestMethod
{
    public function getCode();
    public function guestData();
}

final class Guest implements guestMethod //get token from parse-page and... ::guestData()
{
    public function __construct()
    {
        $this->uri = 'https://oauth.vk.com/access_token?';
        $this->dataApiHttp = http_build_query(array(
            'client_id'     => '7022605',
            'client_secret' => 'a0wYKTdOZk8CnEUxgh0e',
            'redirect_uri'  => 'http://u0742966.isp.regruhosting.ru/access',
            'code'          => $this->getCode()
        ));
        $this->getAccessToken();
        $this->guestData();
    }

    public function getCode()
    {
        return $_GET['code'];
    }

    protected function getAccessToken()
    {
        $curlGuest = curl_init($this->uri.$this->dataApiHttp);
        curl_setopt($curlGuest, CURLOPT_RETURNTRANSFER, true);   //cURL parser  -  only RETURNTRANSFER
        $curlOutput = curl_exec($curlGuest);
        $this->userData = json_decode($curlOutput); //data decoding
        curl_close($curlGuest);
    }

    public function guestData() //takes data - Vk Methods
    {
        $_SESSION['userData'] = array(
            'user_id'      => $this->userData->user_id,
            'access_token' => $this->userData->access_token,
            'v'            => '5.52'                          //for requests
        );

        if(isset($_SESSION['userData'])):
            $userData = curl_init('https://api.vk.com/method/users.get?'.http_build_query($_SESSION['userData']));
            curl_setopt($userData, CURLOPT_RETURNTRANSFER, true);
            $curlOutput = json_decode(curl_exec($userData)); //data decoding
            var_dump($curlOutput);
        else:
            //
        endif;
    }

}

$tokennedGuest = new Guest();

?>