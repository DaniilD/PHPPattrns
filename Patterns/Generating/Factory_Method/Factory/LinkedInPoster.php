<?php


namespace Patterns\Generating\Factory_Method\Factory;
use Patterns\Generating\Factory_Method\Products\LinkedInConnector;
use Patterns\Generating\Factory_Method\Products\SocialNetworkConnector;

/**
 * Этот Конкретный Создатель поддерживает LinkedIn.
 */
class LinkedInPoster extends SocialNetworkPoster
{
    private $email, $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new LinkedinConnector($this->email, $this->password);
    }
}