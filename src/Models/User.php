<?php

namespace Rndwiga\Authentication\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function routeNotificationForSlack()
    {
        //  return $this->slack_webhook_url; //use this if you have slack_webhook_url
        //in database
        $webhookURL = 'https://musonikenya.slack.com/services/hooks/slackbot?token=wzk12tgwgBsAAHUIibDTUJ48&channel=cashflow-nofication';
      //  $webhookURL = 'https://musonikenya.slack.com/services/hooks/slackbot?token=wzk12tgwgBsAAHUIibDTUJ48';
        return $webhookURL;
    }

    public function office()
      {
        return $this->belongsTo(Office::class);
      }
}
