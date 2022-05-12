<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use App\Models\Post;

class InsertAllPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = json_decode($response->body(), true);
        $this->info(count($posts).' Getted');
        Post::insert($posts);
        $this->info('All posts has inserted');
    }
}
