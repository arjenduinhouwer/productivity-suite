<?php
/**
 * Created by PhpStorm.
 * User: arjen
 * Date: 9/8/17
 * Time: 3:56 PM
 */

namespace App\Http\Controllers;

use App\Repositories\IssueRepository;

class IssuesController
{
    public function index(IssueRepository $issues)
    {
        $page = (!is_null(request()->get('page')))? '?' .request()->getQueryString() : '?page=1';

        $response = $issues->all($page);

        $issues = json_decode($response->getBody());
        $links = $response->getHeaders()['Link'];

        $raw = explode(',', $links[0]);

        $pagination = [];

        $count = 0;
        foreach($raw as $link)
        {

            $pagination[$count] = [];
            $href = str_replace('<' , '', $link);
            $href = str_replace('>' , '', $href);
//            dd($href);

            $url = trim(substr($href, 0, strpos($href,';')));
//            dd($url);
            $url = substr($url, strpos($url, '?'));

            $title = trim(substr($href, strpos($href,'rel=')));
            $title = explode('="', $title);
            $title = str_replace('"', '', $title[1]);

            $pagination[$count]['url'] = $url;
            $pagination[$count]['title'] = $title;

            $count++;
        }

        return view('issues.index', compact('issues', 'pagination'));
    }

    public function detail(IssueRepository $issues)
    {
        $issue = $issues->detail();


        foreach($issue->labels as $l)
        {
            if((int)$l->color < (0xffffff/1))
            {
                $l->text_color = 'fff';
            }
            else {
                $l->text_color = '000';
            }
        }


        return view('issues.detail', compact('issue'));

    }

    public function close(IssueRepository $issues)
    {
        $issue = $issues->close();

        return redirect('/issues');
    }
}