<?php
/**
 * Created by PhpStorm.
 * User: Ignatenkov Nikita
 * Site: http://ignatenkovnikita.ru/
 * Date: 28.03.2016
 * Time: 12:59
 */

namespace ignatenkovnikita\smsreceiver;


class FactoryMessage
{
    /**
     * @param $data
     * @return array
     */
    public static function getMessages($data)
    {
        /** @var array $messages */
        $messages = [];

        if (is_array($data)) {
            foreach ($data as $item) {
                $messages[] = self::getMessage($item);
            }
        } else {
            $messages[] = self::getMessage($data);
        }
        return $messages;
    }

    /**
     * @param $data
     * @return MessageModel
     */
    public static function getMessage($data)
    {
        $message = new MessageModel();
        $message->destinationNumber = $data->addresses->destinationNumber;
        $message->sourceNumber = $data->addresses->sourceNumber;
        $message->message = $data->message;
        $message->messageId = $data->messageId;

        return $message;
    }
}