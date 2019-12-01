<?php

namespace Rndwiga\Gatekeeper\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Rndwiga\Authentication\Models\User;

class EmailLogin extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->hasOne(User::class, 'email','email');
    }

    public static function createForEmail($email){
        return self::create([
            'email' => $email,
            'token' => str_random(60)
        ]);
    }

    /**
     * This function checks if the token exists and whether it was generated less than 15 minutes
     * @param $token
     * @return mixed
     */

    public static function validateFromToken($token){
        return self::where('token', $token)
            ->where('created_at', '>', Carbon::parse('-15 minutes'))
            ->firstOrFail();
    }
}
