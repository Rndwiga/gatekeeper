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

    public static function getPublicRoutes(){
        $public =  __DIR__.'/Routes/Web/';
        if (is_dir($public)){
            $scanned_directory = array_diff(scandir($public), array('..', '.'));
            $routeFiles = [];
            array_walk($scanned_directory,function ($scannedFile) use (&$routeFiles,&$public){

                $routeFiles[] = $public.$scannedFile;
            });

            return $routeFiles;
        }
        return false;
    }

    public static function getPrivateRoutes(){
        $public =  __DIR__.'/Routes/Api/';
        if (is_dir($public)){
            $scanned_directory = array_diff(scandir($public), array('..', '.'));
            $routeFiles = [];
            array_walk($scanned_directory,function ($scannedFile) use (&$routeFiles,&$public){

                $routeFiles[] = $public.$scannedFile;
            });

            return $routeFiles;
        }
        return false;
    }

    public static function getConfig(){
        return __DIR__.'/Config/authorization.php';
    }

    public static function getViews(){
        return __DIR__.'/Resources/Views';
    }

    public static function getAllowedEmailDomains(){
        $envDomains = env('AUTHENTICATION_EMAIL_DOMAINS_ALLOWED');

        if (isset($envDomains)){
            return [$envDomains];
        }
        return [];
    }
}