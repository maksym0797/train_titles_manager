<?php


namespace App\TitlesManager\Auth\Services;


use GuzzleHttp\Client;

/**
 * Class AuthService
 * @package App\TitlesManager\Auth\Services
 */
class AuthService
{
    /**
     * @var
     */
    private $oClient;

    /**
     * @var Client
     */
    private $http;

    /**
     * AuthService constructor.
     */
    public function __construct()
    {
        $this->oClient = OClient::where(['password_client' => 1])->first();
        $this->http = new Client() ;
    }

    /**
     * @param string $email
     * @param string $password
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTokenAndRefreshRoken(string $email, string $password)
    {

        $response = $this->http->post(\url('/oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $this->oClient->id,
                'client_secret' => $this->oClient->secret,
                'username' => $email,
                'password' => $password,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param string $refreshToken
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshToken(string $refreshToken)
    {
        $response = $this->http->post(\url('/oauth/token'), [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => 'the-refresh-token',
                'client_id' => $this->oClient->id,
                'client_secret' => $this->oClient->secret,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
