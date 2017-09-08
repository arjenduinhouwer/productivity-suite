<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 9/8/17
 * Time: 3:56 PM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class IssuesController
{
    public function index()
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . env('GITHUB_ACCESS_TOKEN')
        ];

        $response = $client->request(
            'GET',
            'https://api.github.com/issues',
            ['headers' => $headers]
        );

        $issues = json_decode($response->getBody());

        return view('issues.index', compact('issues'));
    }

    public function detail()
    {
        $owner = request()->get('owner');
        $repo = request()->get('repo');
        $issue = request()->get('issue_nr');

        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . env('GITHUB_ACCESS_TOKEN')
        ];

        $response = $client->request(
            'GET',
            'https://api.github.com/repos/' . $owner . '/' . $repo. '/issues/' .$issue,
            ['headers' => $headers]
        );

        $issue = json_decode($response->getBody());

        $comments = null;

        if($issue->comments > 0)
        {
            $response2 = $client->request(
                'GET',
                $issue->comments_url,
                ['headers' => $headers]
            );

            $comments = $response2->getBody();
            $str = '';

            while(!$comments->eof())
            {
                $str .= $comments->read(1024);
            }

            $comments = json_decode($str);
        }


//        dd($comments[1]->user);

        return view('issues.detail', compact('issue', 'comments'));

    }
}