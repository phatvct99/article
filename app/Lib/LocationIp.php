<?php

namespace App\Lib;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

use Stevebauman\Location\Drivers\IpInfo;


/**
 * Class Location
 *
 * @package App\Lib
 */
class LocationIp
{
    public function getLocation($request){
        $userIp = $request->getClientIp();
        $ip = long2ip(mt_rand());
        $locationData = Location::get($ip);
        // dd($locationData);
    }

}
