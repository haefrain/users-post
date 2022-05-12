<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class CreateComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $posts, $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = Post::get('id');
        $this->users = User::get('id');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Comment::factory()->count(1)->create();
    }
}
