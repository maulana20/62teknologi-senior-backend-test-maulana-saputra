<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LocaleGetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'locale:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'GET data local from URL';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = @file_get_contents("https://raw.githubusercontent.com/citation-style-language/locales/master/locales.json");
        $locales = json_encode(array_map(function($language) {
            return $language[1];
        }, json_decode($response, true)["language-names"]));
        $file = Storage::disk('public')->path('business/locales.json');
        file_put_contents($file, $locales);
        return 0;
    }
}
