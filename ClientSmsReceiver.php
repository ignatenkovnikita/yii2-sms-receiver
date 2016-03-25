<?php
/**
 * Created by PhpStorm.
 * User: Ignatenkov Nikita
 * Site: http://ignatenkovnikita.ru/
 * Date: 25.03.2016
 * Time: 20:02
 */

namespace ignatenkovnikita\smsreceiver;


use yii\base\Component;

class ClientSmsReceiver extends Component
{
    /** @var  \SoapClient $_client */
    private $_client;
    /** @var  string $gate */
    public $gate;
    /** @var  array $credentials */
    public $credentials;
    /** @var  integer $maxLimit */
    public $maxLimit;

    public function init()
    {
        parent::init();
        $this->_client = new \SoapClient($this->gate, ["trace" => 1, "exceptions" => 0]);
    }

    public function getMessages()
    {
        $params = [
            'owner' => $this->credentials,
            'maxLimit' => $this->maxLimit
        ];


        $result = $this->_client->getMessages($params);
        return $result->return;
    }

    public function sendMessage($phone, $message)
    {
        $params = [
            'generator' => $this->credentials,
            //'shortPhone' => '',
            'clientPhone' => $phone,
            'message' => $message
        ];

        $result = $this->_client->sendOutboundMessage($params);
        return $result->return;
    }

}