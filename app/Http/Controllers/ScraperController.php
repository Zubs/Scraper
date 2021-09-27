<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

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
        $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
        $links = $crawler->filter('.result__title .result__a')->each(function ($node) {
            return $node->text();
        });
        return view('welcome')->with('links', $links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
