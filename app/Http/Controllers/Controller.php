<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function badRequestResponse($ip, $message = '')
    {
    	$errorMessage = 'City not found! IP is not valid!';
    	if (!empty($message)) {
    		$errorMessage = $message;
    	}
    	
    	return response()->json([
            'ip' => $ip,
            'error_message' => $errorMessage,
        ]);
    }
}
