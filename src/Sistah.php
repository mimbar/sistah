<?php

namespace Mimbar\Sistah;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class Sistah
{
    /*
     * Akun
     */
    protected $id_pengguna;
    protected $sister_url;
    protected $username;
    protected $password;

    /* Callback dosen */
    public $id_dosen;
    protected $nip;
    protected $nidn;

    /* Init Guzzle */
    protected $gz;

    public function __construct($id_dosen = null)
    {
        $token = $this->getToken();
        $ws = $token->sister_server == 'sb' ? 'ws-sandbox' : 'ws';

        $this->id_pengguna = $token->sister_id_pengguna;
        $this->username = $token->sister_username;
        $this->password = $token->sister_password;
        $this->token = $token->token;

        $this->id_dosen = $id_dosen;

        $this->sister_url = $token->sister_url."/".$ws.".php/1.0";

        $gz = Http::baseUrl($this->sister_url)
            ->withToken($this->token)
            ->timeout(0)
            ->withoutRedirecting()
            ->acceptJson()
            ->retry(2, 0, function ($exception, $request) {
                if (!$exception instanceof RequestException || $exception->response->status() !== 401) {
                    return false;
                }

                $request->withToken($this->refreshToken());

                return true;
            });
        $this->gz = $gz;
    }

    public function getToken()
    {
        $token = \Illuminate\Support\Facades\Storage::get('token.json');
        $data = [
            'sister_server' => config('sistah.sister_server'),
            'sister_url' => config('sistah.sister_url'),
            'sister_id_pengguna' => config('sistah.sister_id_pengguna'),
            'sister_username' => config('sistah.sister_username'),
            'sister_password' => config('sistah.sister_password'),
            'token' => json_decode($token),
        ];

        return (object) $data;
    }

    public function refreshToken()
    {
        $response = $this->gz->post('authorize', [
            "username" => $this->username,
            "password" => $this->password,
            "id_pengguna" => $this->id_pengguna
        ]);
        $response = $response->object();

        $str = $response->token;
        \Illuminate\Support\Facades\Storage::put('token.json', json_encode($str));
        return $response->token;
    }
}
