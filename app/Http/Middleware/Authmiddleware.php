<?php
namespace App\Http\Middleware;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;
use App\Models\User;

// 去Controller  User.php  確認 user 和 password


class Authmiddleware {
    public function handle($request, Closure $next)
    {
        switch ($request->path()) {
            case 'doLogin':  
                 
                $id = $request->header('id');
                $pass = $request->header('password');
              
                // 訪問model
                $user = new User();
                $isAuthorized = $user->loginModel($id, $pass);

                if ($isAuthorized){
                    $token = $this->genToken($id);
                    return response($token, 200);
                }
                else{
                    return response("帳號密碼錯誤",401);
                };
            
            case 'register':
                $pass = $request->input('password');
                $name = $request->input('name');
                $email = $request->input('email');
                $user = new User();
                $isAuthorized = $user->registerModel( $name, $pass, $email);
                // $isAuthorize 拿id

                if ($isAuthorized){
                    return response("註冊成功", 200);
                }
                else{
                    return response("帳號已存在",401);
                };
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