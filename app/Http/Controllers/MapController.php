<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 12/6/17
 * Time: 3:22 PM
 */

namespace App\Http\Controllers;


class MapController extends Controller
{
    public function index()
    {
        return view('maps.index');
    }
}