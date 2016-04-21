Client for service sms receiver
===============================
Client for service sms receiver

[![Latest Stable Version](https://poser.pugx.org/ignatenkovnikita/yii2-sms-receiver/v/stable)](https://packagist.org/packages/ignatenkovnikita/yii2-sms-receiver) [![Total Downloads](https://poser.pugx.org/ignatenkovnikita/yii2-sms-receiver/downloads)](https://packagist.org/packages/ignatenkovnikita/yii2-sms-receiver) [![Latest Unstable Version](https://poser.pugx.org/ignatenkovnikita/yii2-sms-receiver/v/unstable)](https://packagist.org/packages/ignatenkovnikita/yii2-sms-receiver) [![License](https://poser.pugx.org/ignatenkovnikita/yii2-sms-receiver/license)](https://packagist.org/packages/ignatenkovnikita/yii2-sms-receiver)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ignatenkovnikita/yii2-sms-receiver "*"
```

or add

```
"ignatenkovnikita/yii2-sms-receiver": "*"
```

to the require section of your `composer.json` file.


Usage
-----
Add this to your main configuration's components array:

```php
'smsReceiver' => [
            'class' => \ignatenkovnikita\smssender\ClientSmsReceiver::className(),
            'gate' => your_gate,
            'credentials' => [
                'ID' => your_id_,
                'name' => yout_name_,
                'password' => your_pasword
            ],
            'maxLimit' => your_limit
        ],
```
Typical component usage
-----------------------
```php
Yii::$app->smsReceiver->getMessages();
Yii::$app->smsReceiver->sendMessage(your_short, your_phone, your_message);
```
