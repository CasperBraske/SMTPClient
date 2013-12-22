SMTP Client [![Build Status](https://travis-ci.org/andreyknupp/SMTPClient.png?branch=master)](https://travis-ci.org/andreyknupp/SMTPClient)
===========
Just a powerful *Simple Mail Transfer Protocol* (SMTP) client to send mail messages. <br />
*"This is a specific guy for send mail messages over SMTP, isn't a universal mailer that covers all methods for sending a mail*"

How it works.
---------------------------
In a simple and robustly way, you can send mail messages using SMTP servers.
First of all you need to create a connection and perform authentication for the user. After that, send the message, and done.

Firstly we need an SMTP server. Here, we will use the gmail server. 
Using the settings from "Outgoing Mail (SMTP) Server" from [Google](https://support.google.com/mail/answer/13287), 
we'll perform the connection and authentication for the user.

```PHP
<?php

require_once "config/bootstrap.php";

use utils\net\SMTP\Client; // SMTP client
use utils\net\SMTP\Client\Authentication\Login; // authentication mechanism
use utils\net\SMTP\Client\Connection\SSLConnection; // the connection
use utils\net\SMTP\Message; // the message

$client = new Client(new SSLConnection("smtp.gmail.com", 465));
$client->authenticate(new Login("user@gmail.com", "pswd"));
```
With that, we're connected and probably authenticated (if you replaced the **user@gmail.com** and **pswd** with valid credentials). <br />
Then, just send the message.
```PHP
$message = new Message();
$message->from("user@gmail.com") // sender
        ->to("other-user@domain.com") // receiver
        ->subject("Hello") // message subject
        ->body("Hello World"); // message content

echo $client->send($message) ? "Message sent" : "Opz";
```
Be happy if the message was sent. <br />
Otherwise, you can open a issue [here](https://github.com/andreyknupp/SMTPClient/issues/new) if you can't identify the problem type (e.g: credentials, connection [host, port]) to resolve it.

How can I use/test ?
----------------------
First, clone the repository.
```bash
$ git clone git://github.com/andreyknupp/SMTPClient.git
$ cd SMTPClient/
```
Switch to the current directory to SMTPClient directory.
```bash
$ cd SMTPClient/
```
Install dependencies via composer.
```bash
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar install
```
Performing unit tests isn't possible currently, but you will be able to in a near future. <br />
Thanks, you're free to contribute with anything you think you can.
