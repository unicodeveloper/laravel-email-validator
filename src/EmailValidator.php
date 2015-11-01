<?php

namespace Unicodeveloper\EmailValidator;

use QuickEmailVerification\Client;

class EmailValidator
{

    /**
     * Api Key for quickemailverficationservice
     * @var string
     */
    public $apiKey = '12ed5f648f0e90b1740d7bbfd83f832e2a879eb48de4173bb0008d0c4799';

    /**
     *  Instance of QuickEmailVerification Client
     * @var [type]
     */
    public $client;

    public function __construct()
    {
        $this->setApiKey();
    }

    /**
     * Set Apikey from the Config file
     */
    public function setApiKey()
    {
        $this->client = new Client($this->apiKey);
    }

    /**
     * Verify Email Address
     * @param  string $emailAddress
     * @return boolean
     */
    public function verify($emailAddress)
    {
        $response = $this->client->quickemailverification()->verify($emailAddress);
        var_dump($response);
    }


}
