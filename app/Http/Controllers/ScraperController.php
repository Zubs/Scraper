<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScraperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();

        // Send request to the website
        $website = $client->request('GET', 'https://www.businesslist.com.ng/category/interior-design/city:lagos');

        $companies = $website->filter('.company')->each(function ($node) {
            if ($node->children()->eq(0)->text()) {
                $name = $node->children()->eq(0)->text();
                $address = $node->children()->eq(1)->text();

                return [
                    'name' => $name,
                    'address' => $address,
                    'link' => 'https://www.businesslist.com.ng/category/interior-design/city:lagos' . $node->children()->first()->children('a')->attr('href'),
                ];
            }
        });

        $companies = array_values(array_filter($companies));

        return view('welcome')->with('companies', $companies);
    }

    public function test ()
    {
        $client = new Client();

        // Send request to the website
        $website = $client->request('GET', 'https://www.businesslist.com.ng/category/interior-design/city:lagos');

        $companies = $website->filter('.company')->each(function ($node) {
            if ($node->children()->eq(0)->text()) {
                dump($node->children()->first()->children('a')->attr('href'));
            }
        });

        // dump($companies);
    }
}
