<?php

namespace Rndwiga\Authentication\Models\Client;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ClientOnboarding extends Model
{

    protected $guarded = ['id'];

    public static function getClientByMobileNumber($mobileNumber){
        return self::where('phone_number',$mobileNumber)
            ->where('created_at', '>', Carbon::parse('-1 minute'))
            ->firstOrFail();
    }

    public static function getClientInfobipOtpIdByMobileNumber($mobileNumber){
        return self::where('phone_number',$mobileNumber)
            ->where('created_at', '>', Carbon::parse('-3 minute'))
            //->where('infobip_pid',$otpPid)
            ->first();
    }
}
