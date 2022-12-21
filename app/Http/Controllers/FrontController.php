<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome() 
    {
        $announcements = Announcement::where('is_accepted' , true)->get()->sortByDesc('created_at')->take(3);
        
        return view('welcome', compact('announcements'));
    }
    
    public function categoryShow(Category $category) 
    {
        
        return view('categoryShow', compact('category'));
    }
    
    public function searchAnnouncements(Request $request){
        
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        
        return view('announcement.index' , compact('announcements'));
    }
    
    public function setLanguage($lang){
        
        
        session()->put('locale' , $lang);
        return redirect()->back();
        
    }
}