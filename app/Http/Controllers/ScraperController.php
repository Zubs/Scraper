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

                return [
                    'name' => $name,
                    'address' => $node->children()->eq(1)->text(),
                    'link' => 'https://www.businesslist.com.ng' . $node->children()->first()->children('a')->attr('href'),
                    'website' => $this->getWebsiteAndPhone($name)['website'],
                    'phone' => $this->getWebsiteAndPhone($name)['phone'],
                ];
            }
        });

        $companies = array_values(array_filter($companies));

        return view('welcome')->with('companies', $companies);
    }

    public function getWebsiteAndPhone(string $name)
    {
        $client = new Client();

        $website = $client->request('GET', 'https://www.businesslist.com.ng/category/interior-design/city:lagos');

        $link = $website->selectLink($name)->link();
        $result = $client->click($link);

        if ($result->filter('.weblinks')->first()->count()) {
            // dump($result->filter('.weblinks')->first()->count());
            $site = $result->filter('.weblinks')->first()->text();
        }

        if ($result->filter('.phone')->first()->count()) {
            $phone = $result->filter('.phone')->first()->text();
        }

        return [
            'website' => $site ?? null,
            'phone' => $phone ?? null
        ];
    }

    public function test()
    {
        $client = new Client();

        // Send request to the website
        $website = $client->request('GET', 'https://www.businesslist.com.ng/category/interior-design/city:lagos');

        $companies = $website->filter('.company')->each(function ($node) {
            if ($node->children()->eq(0)->text()) {
                $name = $node->children()->eq(0)->text();

                //$this->getWebsiteAndPhone($name);

                return [
                    'name' => $name,
                    'address' => $node->children()->eq(1)->text(),
                    'link' => 'https://www.businesslist.com.ng' . $node->children()->first()->children('a')->attr('href'),
                    'website' => $this->getWebsiteAndPhone($name)['website'],
                    'phone' => $this->getWebsiteAndPhone($name)['phone'],
                ];
            }
        });

        $companies = array_values(array_filter($companies));

        return view('welcome')->with('companies', $companies);
    }
}
