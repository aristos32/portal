<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    // search action
    public function search(Request $request)
    {
        dd($request->all());
        $query = $request->input('query');
        // Perform search logic here
        // For example, you can use a model to search in the database
        // $results = YourModel::where('column', 'LIKE', '%' . $query . '%')->get();

        // For demonstration, we'll just return the query
        return response()->json(['query' => $query]);
    }
}
