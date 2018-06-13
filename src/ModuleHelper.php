<?php
namespace Rndwiga\Authentication;

class ModuleHelper
{
    public static function getWebRoutes(){
        return __DIR__.'/Routes/web.php';
    }

    public static function getApiRoutes(){
        return __DIR__.'/Routes/api.php';
    }

    public static function getConfig(){
        return __DIR__.'/Config/authorization.php';
    }

    public static function getViews(){
        return __DIR__.'/Resources/Views';
    }

    public static function getAllowedEmailDomains(){
        $emailDomains = ['musoni.co.ke'];
        $envDomains = env('AUTHENTICATION_EMAIL_DOMAINS_ALLOWED');

        if (isset($envDomains)){
            return [$envDomains];
        }
        return $emailDomains;
    }
}