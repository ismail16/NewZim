<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VpnMiddleware
{

    public function handle($request, Closure $next)
    {

        $ip = request()->ip();
        $vpnurl = "https://proxycheck.io/v2/{$ip}";
        $details = json_decode(file_get_contents($vpnurl));
        $arr = (array) $details;
        $data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

        if($arr['status'] == 'error'){
            return "vpn error";
            // $vpn = '';
        }else{
            return $vpn = $arr[$ip]->proxy;
        }
        
        // if() {
        //     return "Country ".$data->geoplugin_countryName;
        // }else{
        //     return "VPN ".$vpn;
        // }
        

        if ($data->geoplugin_countryName == "Bangladesh") {
            return Redirect::to('http://www.google.com');
        }
    
    }
}
