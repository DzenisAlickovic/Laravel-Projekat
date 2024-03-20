<?php

namespace App\Http\Controllers;

use App\Models\NewsFeed;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{

    //Create NewsFeed
    public function create(Request $request){


        $formFields = $request->validate([
            'content' => 'required',
        ]);

        NewsFeed::create($formFields);


        return back()->with('message', 'Vest uspešno dodata!');
    }


    //Delete NewsFeed
    public function destroy(NewsFeed $feed){

        if(!$feed){
            return back()->with('message', 'Vest nije pronadjena!');
        }

        $feed->delete();

        return back()->with('message', 'Vest uspešno obrisana.');
    }


    //Send message to apply for the moderator
    public function applyForModerator()
    {
        if (auth()->user()->role === 'korisnik') {
            $content = auth()->user()->name . '  se prijavio/la za moderatora.';
            NewsFeed::create([
                'content' => $content,
            ]);

            return back()->with('message', 'Vaša prijava je poslata.');
        }

        return back()->with('message', 'Niste kvalifikovani da se prijavite za ulogu moderatora.');
    }

}
