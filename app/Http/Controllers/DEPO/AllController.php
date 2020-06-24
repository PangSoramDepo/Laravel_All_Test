<?php

namespace App\Http\Controllers\DEPO;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\Schedule;
use App\Ticket;
use App\Post;
use App\Comment;
use App\User;

class AllController extends Controller
{
    public function passing_data_to_view()
    {
        //All Passing Data To View Technique
        $data=array(
            'customer'  => "This is Customer",
            'team'      => "Team Depo"
        );
        $another="another";
        return view('customer',$data)->with('label','Testing')->with(compact('data','another'));
    }

    public function store_validation()
    {
        $customer=request()->validate([
            'name'  => 'required'
        ]);

        // if using Team::create($customer) it's will work with Fillable property in Model
    }

    public function scope_testing()
    {
        // Team::where('status','active')->get();
        // Team::active()->get()
        dd(Team::status('active')->get());
    }

    public function wherehas_testing()
    {
        //comments is the function in Post Model
        $posts = Post::whereHas('comments', function (Builder $query) {
            $query->where('descirption', 'like', '%A%');
        })->get();
        dd($posts);
    }

    public function hasone()
    {
        dd(Schedule::first()->ticket);
    }

    public function belongsto_testing()
    {
        dd(Ticket::first()->schedule);
    }

    public function hasmany_testing()
    {
        dd(Post::first()->comments);
    }

    public function belongstomany_testing()
    {
        dd(User::first()->roles[0]->pivot);
    }

}
