<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 10/24/17
 * Time: 5:24 PM
 */

namespace App\Http\Controllers;

use File;
use Storage;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
        return view('invoices.index');
    }

    public function upload(Request $request)
    {
        $url = Storage::putFile('invoices', $request->file('file'));

        return $url;
    }

    public function download()
    {
        $file = Storage::url('invoices/aI0Q9OJTlnvYfy5vJBuKx49Tx3E9QMOySJkGOU33.pdf');
        

        return response()->download(public_path() .$file);
    }
}