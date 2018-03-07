<?php
/**
 * Created by Josiah O. Yahaya
 * Email: josiahoyahaya@gmail.com
 */

namespace Coderatio\Smartsms;

use Coderatio\Smartsms\Foundation\Configurator;

class Smartsms
{
    /**
     * Your smartsms solutions account api token
     * @var string $token
     */
    protected static $token;
    /**
     * @var int $routing
     */
    public $routing = 3;
    /**
     * @var string $to
     */
    protected $to;
    /**
     * @var string $sender
     */
    protected $sender;
    /**
     * @var string $message
     */
    protected $message;
    /**
     * @var Configurator
     */
    protected $config;
    /**
     * @var string $response
     */
    protected $response;
    /**
     * @var string $url
     */
    public $url = 'https://smartsmssolutions.com/api/';

    /**
     * Smartsms constructor.
     */
    public function __construct()
    {
        $this->config = new Configurator();
        self::$token = $this->config->getConfig('token');
        $this->routing = $this->config->getConfig('routing');
    }

    /**
     * The name you want to display as the sender
     * Maximum of 8 characters is advisable
     * @param $sender
     * @return $this
     */
    public function sender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * The name you want to display as the sender
     * Maximum of 8 characters is advisable
     * @param $sender
     * @return $this
     */
    public function from($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * The number or numbers you want to send a message to
     * @param $to
     * @return $this
     */
    public function to($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * The contents you want to send
     * @param $message
     * @return $this
     */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Send message. You can provide your message here.
     * Specifying message here, will overide the contents from
     * the message method above.
     * @param string $message
     * @return string
     */
    public function send($message = '')
    {
        if ($message != '') {
            $this->message = $message;
        }

        $sms = $this->config->post($this->url,
            [
                'to' => $this->to,
                'sender' => $this->sender,
                'message' => $this->message,
                'routing' => $this->routing,
                'token' => self::$token
            ]
        );

        $explodedResult = explode('||', $sms);

        if (isset($explodedResult[0]) && $explodedResult[0] == 1000) {
            $this->response = $explodedResult[1];
        }
        elseif (!isset($explodedResult[0]) || isset(json_decode($sms)->error) && json_decode($sms)->error == true) {
            $this->response = $sms;
        }
        elseif ($sms == false) {
            $error['error'] = true;
            $error['message'] = "Please connect to an active internet connection.";
            $this->response = json_encode($error);
        }
        else {
            $this->response = $sms;
        }

        return $this;

    }

    /**
     * This is where the library get started
     * @param $token
     * @return Smartsms
     */
    public static function init($token = '')
    {
        if ($token != '') {
            self::$token = $token;
        }

        return new Smartsms();
    }

    /**
     * Get sms account units balance
     * @return bool|mixed|string
     */
    public function getBalance()
    {
        return $this->config->post($this->url, [
            'checkbalance' => 1,
            'token' => self::$token
        ]);
    }

    /**
     * The response from the send action.
     * This will return string|json
     * @return mixed
     */
    public function response()
    {
        return $this->response;
    }

    public function asObject()
    {
        return json_decode($this->response);
    }
}