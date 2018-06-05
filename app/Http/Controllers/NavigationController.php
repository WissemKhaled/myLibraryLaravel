<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function showPage(Request $request)
    {
    	if ($request->path() != "/") {

    		// c'est le "par défaut" du Try Catch

    		/*if(view(->exists($request->())) {
    			return view ($request->path());
    		} else {
    			return abort('404');
    		});*/

    		try {
    			return view($request->path());
    		} catch (\Exception $e) {
    			return abort('404');
    		}
    	} else {
    		return view('home');
    	}
    }
}
