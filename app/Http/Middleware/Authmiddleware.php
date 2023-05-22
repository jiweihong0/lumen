<?php
namespace App\Http\Middleware;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class Authmiddleware {
    public function handle($request, Closure $next)
    {
        switch ($request->path()) {
            case 'doLogin':
                $token = $this->genToken(1);

                return response($token, 200);
            case 'register':
                break;
            default:
                // $jwtToken = $request->header('jwtToken');
                $isTokenvailed = $this->checkToken($request);
                if ($isTokenvailed){
                    return $next($request);
                }
                else{
                    return response('無效 Token',401);
                }
        }
    }
    private function checkToken($request)
    {
        $jwtToken = $request->header('jwtToken');
        $secret_key = "key";
        try {
            $payload = JWT::decode($jwtToken, new Key($secret_key, 'HS256'));
            return true;
        } catch (Exception $e) {
            echo $e ->getMessage();
            return false;
        }
    }
    private function genToken($id)
    {
        $secret_key = "key";
        $issuer_claim = "http://blog2.vhost.com";
        $audience_claim = "http://blog2.vhost.com";
        $issuedat_claim = time();
        $expire_claim = $issuedat_claim + 600;
        $payload = array(
            "iss"=>$issuer_claim ,
            "aut"=>$audience_claim,
            "iat"=>$issuedat_claim,
            "exp"=>$expire_claim,
            "data"=>array($id)
        );
        $jwt =JWT::encode($payload,$secret_key, "HS256");
        return $jwt;

    }
}