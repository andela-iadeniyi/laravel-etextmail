<?php

namespace Ibonly\EtextMail\Exception;

use Exception;

class InvalidUserException extends Exception
{
	public function __construct()
    {
        parent::__construct("Invalid Username or Password provided");
    }
}