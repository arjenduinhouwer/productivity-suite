<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 11/28/17
 * Time: 5:46 PM
 */

namespace App\Repositories;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Middleware;

class IssueRepository
{
    private $client;
    private $headers;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client;

        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . env('GITHUB_ACCESS_TOKEN'),
            'User-Agent' => 'Guzzle'
        ];
    }

    public function all($page)
    {
        $response = $this->client->request(
            'GET',
            'https://api.github.com/issues' . $page,
            [
                'headers' => $this->headers
            ]
        );

        return $response;

    }

    public function detail()
    {
        $owner = request()->get('owner');
        $repo = request()->get('repo');
        $issue = request()->get('issue_nr');

        $response = $this->client->request(
            'GET',
            'https://api.github.com/repos/' . $owner . '/' . $repo. '/issues/' .$issue,
            [
                'headers' => $this->headers
            ]
        );

        $issue = json_decode($response->getBody());

        $comments = null;

        if($issue->comments > 0)
        {
            $response2 = $this->client->request(
                'GET',
                $issue->comments_url,
                $this->headers
            );

            $comments = $response2->getBody();
            $str = '';

            while(!$comments->eof())
            {
                $str .= $comments->read(1024);
            }

            $issue->comments = json_decode($str);
        }

        return $issue;

    }

    public function close()
    {
        $owner = request()->get('owner');
        $repo = request()->get('repo');
        $issue = request()->get('issue_nr');

        try
        {
            $data = [
                "state" => "closes",
            ];

            $response = $this->client->request(
                'PATCH',
                'https://api.github.com/repos/' . $owner . '/' . $repo. '/issues/' .$issue,
                [
                    'headers' => $this->headers,
                    'json' => $data
                ]
            );
        } catch(RequestException $e)
        {
            var_dump($e->getRequest());
            dd($e->getCode() .' '. $e->getMessage());
        }

        return true;
    }

    public function create()
    {
        try
        {
            $data = [
                "body" => "Let me add some text",
                "title" => "added from Guzzle",
                "assignees" => ["arjenduinhouwer"],
                "state" => "open",
                "labels" => [],
                "milestone" => null
            ];

            // Grab the client's handler instance.
            $clientHandler = $this->client->getConfig('handler');
//              Create a middleware that echoes parts of the request.
            $tapMiddleware = Middleware::tap(function ($request) {
                echo $request->getHeaderLine('Content-Type');
                // application/json
                echo $request->getBody();
                // {"foo":"bar"}
            });

            $response = $this->client->request(
                'POST',
                'https://api.github.com/repos/arjenduinhouwer/productivity-suite/issues',
                [
                    "headers" => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . env('GITHUB_ACCESS_TOKEN')
                    ],
                    'json' => $data,
                    'handler' => $tapMiddleware($clientHandler)
                ]
            );
        } catch(RequestException $e)
        {
            var_dump($e->getRequest());
            dd($e->getCode() .' '. $e->getMessage());

        }

        return true;
    }
}