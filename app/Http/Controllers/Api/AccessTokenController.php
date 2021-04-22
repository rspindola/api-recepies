<?php


namespace App\Http\Controllers\Api;

use App\Models\Client;
use Laravel\Passport\Http\Controllers\AccessTokenController as AccessTokenControllerOriginal;
use \Psr\Http\Message\ServerRequestInterface;

class AccessTokenController extends AccessTokenControllerOriginal
{

    /**
     * Authorize a client to access the user's account.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface  $request
     * @return \Illuminate\Http\Response
     */
    public function issueToken(ServerRequestInterface $request)
    {
        // Retirando todos os scopes que o client especificado não tem permissão.
        $data = $request->getParsedBody();
        if (isset($data['scope'])) {
            if (isset($data['client_id'])) {
                $client = Client::findOrFail($data['client_id']);
                $clientScopes = $client->permissions->pluck('name');
                $scopes = explode(' ', $data['scope']);

                if (isset($scopes[0]) && $scopes[0] === '*') {
                    $scopes = $clientScopes->all();
                } else {
                    $scopes = $clientScopes->intersect($scopes)->all();
                }

                $data['scope'] = implode(' ', $scopes);
                $request = $request->withParsedBody($data);
            }
        }

        return parent::issueToken($request);
    }
}
