<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Themes;
use App\Models\NewsFeed;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ThemeController extends Controller
{

    //Home Page
    public function home(){
        return view('home', [
            'themes' => Themes::latest()->filter(request(['search']))
            ->paginate(3),
            'newsFeed' => NewsFeed::latest()->get()
        ]);
    }


    //Contact Page
    public function contact(){
        return view('contact');
    }


    //Count Themes
    public function countThemes($moderatorId)
    {
        return Themes::where('user_id', $moderatorId)->count();
    }



    // Get All Themes
    public function index(){
        return view('theme.index', [
            'themes' => Themes::where('user_id', auth()->id())->latest()->filter(request(['search']))
                ->paginate(3),
            'newsFeed' => NewsFeed::latest()->get()
        ]);
    }


    //Show Form For Theme Creation
    public function create(){
        return view('theme.create');
    }



    // Get comments for a single theme
    public function show(Themes $theme)
    {

        $comments = Comment::where('theme_id', $theme->id)->paginate(3);

        return view('theme.show', [
            'theme' => $theme,
            'comments' => $comments,
        ]);
    }



    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('themes','title')],
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('storage'), $imageName);

        $formFields['user_id'] = auth()->id();
        $formFields['image'] = $imageName;

        Themes::create($formFields);

        $themeTitle = $formFields['title'];
        NewsFeed::create([
            'content' => auth()->user()->name . " je kreirao/la novu temu. Tema je:  '$themeTitle'",
        ]);

        return redirect('/')->with('message','Tema uspešno kreirana!');
    }



    //Show Edit Form
    public function edit(Themes $theme){
        return view('theme.edit', ['theme' => $theme]);
    }


    //Update Theme Data
    public function update(Request $request, Themes $theme)
    {

        if ($theme->user_id != auth()->id()) {
            abort(403, 'Nedozvoljena radnja');
        }


        $formFields = $request->validate([
            'title' => ['required'],
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
            $formFields['image'] = $imageName;
        }

        $theme->update($formFields);

        $themeTitle = $formFields['title'];
        NewsFeed::create([
            'content' => auth()->user()->name . " je izmenio/la temu '$themeTitle'",
        ]);

        return back()->with('message', 'Tema uspešno ažurirana!');
    }



    //Delete Theme
    public function destroy(Themes $theme)
    {

        if($theme->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }

        $theme->comments()->delete();

        $themeTitle = $theme->title;
        NewsFeed::create([
            'content' => auth()->user()->name . " je obrisao/la temu '$themeTitle'",
        ]);

        $theme->delete();

        return redirect('/')->with('message', "Tema uspešno obrisana!");
    }




    //Manage Courses
    public function manage(){

        return view('theme.manage',['themes' => auth()->user()->themes()->get()]);
    }

}
