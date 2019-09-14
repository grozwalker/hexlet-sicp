<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Database\Schema\Blueprint;
use Schema;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testShow()
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

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('users.show', $user->name));

        $response->assertStatus(200)
            ->assertSee($user->name);
    }
}
