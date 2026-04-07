<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CataloguesController extends Controller
{

    public function new_post(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        // TODO only logged in users
        if( !Auth::check() )
            return redirect(null, 403)->route('home');

        $user = Auth::user();

        $cat = new Catalogue($validated);
        $cat->design = [];
        $cat->owner()->associate($user);
        $cat->save();
        // TODO LOG

        return redirect()->route('map');
    }
}
