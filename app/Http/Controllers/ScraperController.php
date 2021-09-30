<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScraperController extends Controller
{
    /**
     * TODOS
     * All paint company's in Lagos
     * Painters in Lagos
     * Interior decor in Lagos
     * Suppliers of Paints and POP ceilings
     * Distributors of Paints in Lagos
     * Painting company In Lagos.
     * Furniture making companies in Lagos.
     *
     * Location, Contact details, and any other important info
     *
     * Site link: https://invoice.ng/blog/business-listing-sites-in-nigeria/
     */

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
            return [
                'nodeName' => $node->nodeName(),
                'attributes' => [
                    'class' => $node->attr('class'),
                    'id' => $node->attr('id'),
                ],
                'html' => $node->html(),
                'outerHTML' => $node->outerHtml()
            ];
        });

        dump($companies);
    }
}
