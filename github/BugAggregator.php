<?php

namespace Github;
use App\Bug;

/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 9/8/17
 * Time: 8:14 PM
 */
class BugAggregator
{

    protected $client;
    protected $issues;
    public $bugs = [];

    /**
     * BugAggregator constructor.
     * @param $client
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function run()
    {
        $headers = [
            'Authorization' => 'Bearer ' . env('GITHUB_ACCESS_TOKEN')
        ];

        $response = $this->client->request(
            'GET',
            'https://api.github.com/issues?labels=bug',
            ['headers' => $headers]
        );

        $this->issues = json_decode($response->getBody());

        return $this;
    }

    public function compare()
    {
        foreach($this->issues as $issue)
        {
            $check = Bug::find($issue->id);

            if(!is_null($check))
                continue;

            $bug = new \App\Bug();

            $bug->id = $issue->id;
            $bug->number = $issue->number;
            $bug->title = $issue->title;
            $bug->labels = "some string for now";
            $bug->user = $issue->user->login;
            $bug->html_url = $issue->html_url;
            $bug->body = $issue->body;

            $bug->save();

            $this->bugs[] = $bug;

            $this->notify();
        }

        return $this;
    }

    protected function notify()
    {
        $MessageBird = new \MessageBird\Client(env('MESSAGEBIRD_KEY'));

        $Message = new \MessageBird\Objects\Message();
        $Message->originator = 'arjenduin';
        $Message->recipients = array(31614148001);
        $Message->body = 'Je hebt ' . count($this->bugs) . ' nieuwe bugs op je naam!';

        $MessageBird->messages->create($Message);
    }
}