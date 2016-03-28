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

    /**
     * Function return array of MessageModel
     * @return array
     */
    public function getMessages()
    {
        $params = [
            'owner' => $this->credentials,
            'maxLimit' => $this->maxLimit
        ];

        $result = $this->_client->getMessages($params);
        //$result->return = FakeData::getData();
        var_dump($result->return);
        return FactoryMessage::getMessages($result->return);
    }

    /**
     * Send message after receiver
     * @param $shortPhone
     * @param $clientPhone
     * @param $message
     * @return mixed
     */
    public function sendMessage($shortPhone, $clientPhone , $message)
    {
        $params = [
            'generator' => $this->credentials,
            'shortPhone' => $shortPhone,
            'clientPhone' => $clientPhone,
            'message' => $message
        ];

        $result = $this->_client->sendOutboundMessage($params);
        return $result->return;
    }
}