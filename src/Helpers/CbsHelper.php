<?php
/**
 * Created by PhpStorm.
 * User: rndwiga
 * Date: 8/5/18
 * Time: 11:39 AM
 */

namespace Rndwiga\Authentication\Helpers;


class CbsHelper
{

    public function doesClientExistInMifos($clientIdentifier){
        $data = (new \Rndwiga\Mifos\src\Modules\Search\ClientSearch())->searchClientIdentifier(false,$clientIdentifier);
        if (count($data) > 0){
            return true;
        }else{
            return false;
        }
    }
}