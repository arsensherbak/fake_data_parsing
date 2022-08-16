<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;


class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        $data = (json_decode($response->getBody()->getContents()));

        foreach ($data as $item){
            Post::firstOrCreate([
                'title'=>$item->title
            ],[
                'userId'=>$item->userId,
                'title'=>$item->title,
                'body'=>$item->body
            ]);
    }
    }
}
