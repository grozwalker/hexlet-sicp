<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Schema::create('read_chapters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('chapter_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->unique(['chapter_id', 'user_id']);

            $table->foreign('chapter_id')
                ->references('id')
                ->on('chapters');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        return view('home');
    }
}
