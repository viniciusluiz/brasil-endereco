<?php

namespace Minime\Provedor;

use Httpful\Request;

class HttpRequest {

    public static function urlOpen($url, $data) {
        try {
            $request = \Httpful\Request::post($url);
            $request->body($data);
    
            return $request->sendsForm()->sendIt();
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("Invalid argument to request. [$e]");
        }
    }

}
