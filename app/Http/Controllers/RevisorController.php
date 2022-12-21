<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){

        $announcement_to_check = Announcement::where('is_accepted' , null)->first();
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return view('revisor.index' , compact('announcement_to_check' , 'announcements'));


    }

    // public function acceptAnnouncement(Announcement $announcement){

    //     $announcement->setAccepted(true);
    //     return redirect()->route('revisor.index')->with('message' , 'Complimenti, hai accettato l\'annuncio');
    // }

    public function rejectAnnouncement(Announcement $announcement){

        $announcement->setAccepted(false);
        return redirect()->route('revisor.index')->with('message' , 'Complimenti, hai rifiutato l\'annuncio');
    }

    // public function goBackAnnouncement(Announcement $announcement){

    //     $announcement->setAccepted(null);
    //     return redirect()->route('revisor.index')->with('message' , 'Sei tornato indietro di uno step');

    // }

    public function changeAnnouncementStatus(Announcement $announcement, $value){
     
        if($value == 'null'){
            $value = null;
        } 
        if($value == 'false'){
            $value = false;
        }
        $announcement->is_accepted = $value;
        $announcement->save();
        return redirect()->route('revisor.index');
    }

    public function getAnnouncement(Announcement $announcement){

        return view('revisor.show' , compact('announcement'));

    }

    public function becomeRevisor(){

        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message' , 'Complimenti, hai richiesto di diventare revisore correttamente');
    }

    public function makeRevisor(User $user){

        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);

       
        return redirect('/')->with('message' , 'Complimenti, l\'utente è diventato revisore');
    }



}
