<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 11/3/17
 * Time: 3:16 PM
 */

namespace App\Http\Controllers;

use Log;
use ZMQ;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Promise;

class MessagesController extends Controller
{
    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $context = new \ZMQContext();
        $socket = $context->getSocket(ZMQ::SOCKET_PUSH);
        $socket->connect('tcp://localhost:5555');

        $data =  array(
              'category' => 'messages'
            , 'title'    => $request->get('title')
            , 'article'  => 'lorem ipsum ...'
            , 'when'     => time()
        );

        $socket->send(json_encode($data));

        return redirect('/messages/create');
    }

    public function deferred()
    {
       $promise = new Promise();

       $promise->resolve(function(){
           $factor = 2;

           $results = [];

           for($i =0; $i < 5; $i++)
           {
               $results[] = $i*$factor;
               sleep(1);
           }

           return 'arjen';
       });

        $promise
            ->then(function($value){
                Log::info($value);
            })
            ->then(function($value){
                Log::info($value);
            });


       return 'done';
    }
}