<?php
/**
 * Created by PhpStorm.
 * User: Ignatenkov Nikita
 * Site: http://ignatenkovnikita.ru/
 * Date: 28.03.2016
 * Time: 12:58
 */

namespace ignatenkovnikita\smsreceiver;


use yii\base\Model;

class MessageModel extends Model
{
    /** @var  integer $destinationNumber */
    public $destinationNumber;
    /** @var  integer $sourceNumber */
    public $sourceNumber;
    /** @var  string $message */
    public $message;
    /** @var  string $messageId */
    public $messageId;

    public function rules()
    {
        return [
            [['destinationNumber', 'sourceNumber', 'message', 'messageId'], 'required'],
        ];
    }
}