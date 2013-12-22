<?php

/**
 * @package utils.net.SMTP.Message.Header
 * @filesource utils\net\SMTP\Message\Header\Date.php
 * @author Andrey Knupp Vital <andreykvital@gmail.com>
 */
namespace utils\net\SMTP\Message\Header;
use utils\net\SMTP\Message\AbstractHeader;

class ContentType extends AbstractHeader
{

    public function __construct($contentType = 'plain')
    {

        parent::__construct("Content-type", "text/$contentType;");
	
    }
    
}
