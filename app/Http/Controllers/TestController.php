<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class TestController extends Controller
{
    public function index()
    {
        $dirty_html = "<script> alert('Hai'); </script>";
        $clean_html = Purifier::clean($dirty_html);

        return $clean_html;
    }
}
