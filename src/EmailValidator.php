<?php

namespace Unicodeveloper\EmailValidator;

use InvalidArgumentException;
use QuickEmailVerification\Client;
use Illuminate\Support\Facades\Config;

class EmailValidator
{
    /**
     * Various response messages based on verification status
     * @var array
     */
    public $serverResponses = [
        'invalid_email'       => 'Specified email has invalid email address syntax',
        'invalid_domain'      => 'Domain name does not exist',
        'rejected_email'      => 'SMTP server rejected email. Email does not exist',
        'accepted_email'      => 'SMTP server accepted email address',
        'no_connect'          => 'SMTP server connection failure',
        'timeout'             => 'Session time out occurred at SMTP server',
        'unavailable_smtp'    => 'SMTP server is not available to process request',
        'unexpected_error'    => 'An unexpected error has occurred',
        'no_mx_record'        => 'Could not get MX records for domain',
        'temporarily_blocked' => 'Email is temporarily greylisted',
        'exceeded_storage'    => 'SMTP server rejected email. Exceeded storage allocation'
    ];

    /**
     * Api Key for quickemailverficationservice
     * @var string
     */
    public $apiKey;

    /**
     *  Instance of QuickEmailVerification Client
     * @var object
     */
    public $client;

    /**
     * Response from the QuickEmailVerification Service
     * @var object
     */
    public $response;

    public function __construct()
    {
        $this->setApiKey();
        $this->setClient();
    }

    /**
     * Get apiKey from Config file
     * @return void
     */
    public function setApikey()
    {
        $this->apiKey = Config::get('emailValidator.apiKey');
    }

    /**
     * Instantiate QuickEmailVerification Client with api Key
     * @return void
     */
    public function setClient()
    {
        if(empty($this->apiKey))
        {
            throw new InvalidArgumentException('Api key can not be empty');
        }

        $this->client = new Client($this->apiKey);
    }

    /**
     * Verifies email Address and returns an API Object response
     * @param  string $emailAddress
     * @return instance
     */
    public function verify($emailAddress)
    {
        $this->response = $this->client->quickemailverification()->verify($emailAddress);

        return $this;
    }

    /**
     * Returns an array with true/false and an appropriate message when doing the email verification
     * @return array
     * @throws \InvalidArgumentException
     */
    public function isValid()
    {
        $status = $this->response->body['result'];
        $reason = $this->response->body['reason'];

        switch($status):
            case 'valid':
                return [true, $this->getReason($reason)];
                break;
            case 'invalid':
            case 'unknown':
                return [false, $this->getReason($reason)];
                break;
            default:
                throw new InvalidArgumentException('Invalid Response');
        endSwitch;
    }

    /**
     * Get the reason whether the email is valid, invalid or unknown
     * @param  string $reason
     * @return string
     */
    public function getReason($reason)
    {
        return $this->serverResponses[$reason];
    }

    /**
     * Returns true or false if the email address uses a disposable domain
     * @return boolean
     */
    public function isDisposable()
    {
        return $this->response->body['disposable'];
    }

    /**
     * Returns true or false if the API request was successful
     * @return boolean
     */
    public function apiRequestStatus()
    {
        return $this->response->body['success'];
    }

    /**
     * Get the domain of the provided email address
     * @return string
     */
    public function getDomainName()
    {
        return $this->response->body['domain'];
    }

    /**
     * Get the local part of an email address
     * Example: prosperotemuyiwa@gmail.com returns prosperotemuyiwa
     * @return string
     */
    public function getUser()
    {
        return $this->response->body['user'];
    }

    /**
     * Gets a normalized version of the email address
     * Example: ProsperOtemuyiwa@gmail.com returns prosperotemuyiwa@gmail.com
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->response->body['email'];
    }

    /**
     * Returns true if the domain appears to accept all emails delivered to that domain
     * @return boolean
     */
    public function acceptEmailsDeliveredToDomain()
    {
        return $this->response->body['accept_all'];
    }

    /**
     * Returns true or false if email address is a role address
     * Example manager@example.com , ceo@example.com will return true
     * @return boolean
     */
    public function isRole()
    {
        return $this->response->body['role'];
    }
}
