<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function successFlashData($route, $message)
    {
        return redirect()->route($route)->with('success', $message);
    }

    public function failedFlashData($route, $message)
    {
        return redirect()->route($route)->with('failed', $message);
    }
}
