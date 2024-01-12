<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return voids
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function pr($data)
    {
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }

    public function prx($data)
    {
        $this->pr($data);
        die;
    }

    public function generateRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function _send_mail($data)
    {

        if (!empty($data)) {

            $to = $data['to'];
            /*$subject = $data['subject'];
			$headers = 'X-Mailer: PHP/' . phpversion(). "\r\n";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";  
			$headers .= 'From:'.$data['from']. "\r\n";	
			$headers .= 'Reply-To:'.$data['from']. "\r\n";	


			if(!empty($data['cc'])){
				$headers .= "Cc:".$data['cc']. "\r\n";	
			}
			$message = $data['body'];*/

            $mail_params = [];
            $mail_params['to'] = $to;
            $mail_params['from'] = $data['from'];
            $mail_params['cc'] = "testlate9@gmail.com";
            $mail_params['subject'] = $data['subject'];
            $mail_params['body'] = $data['body'];
            // $this->prx($mail_params);

            if ($this->mg_mail($mail_params)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function mg_mail($params = [])
    {



        $_params = ['to' => 'to@apphinge.com', 'subject' => 'Test Subject | ' . date('Y m d H:i:s'), 'body' => 'Test Body'];

        //       $this->pr($_params);
        // $this->pr($params);

        foreach ($params as $k => $param) {
            if (!strlen(trim($param)) || !array_key_exists($k, $_params)) {
                $r = "$k is empty";
                //$this->pr($r);
                //return $r;
            }
        }


        $username = 'api';
        $password = 'key-c58a069be6d91f94336037421eeb84fb';

        $from = ($params['from']) ? $params['from'] : 'admin@apphinge.com';

        $data = [];
        if (!empty($params['cc'])) {

            $data['cc'] = $params['cc'];
        }

        $data = [
            'to' => $params['to'],
            'from' => $from,
            'subject' => $params['subject'],
            'html' => $params['body']
        ];

        /*  $this->prx($data);

        die;*/
        $req = '';
        foreach ($data as $key => $value) {
            $value = urlencode($value);
            $req .= "&$key=$value";
        }
        $_url = "https://api.mailgun.net/v3/mail.apphinge.com/messages";

        $ch = curl_init();
        $curlConfig = [
            CURLOPT_URL => $_url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $req,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => "{$username}:{$password}"
        ];
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch);

        //$this->prx($result);
        curl_close($ch);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
