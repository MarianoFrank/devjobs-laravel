<?php

namespace App\Console\Commands;

use App\Models\Offer;

use Illuminate\Console\Command;
use function Laravel\Prompts\progress;

class OfferFactory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:offer-factory {recruiterId=1} {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run offer factory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        progress(
            label: 'Making Offer/s',
            steps: $this->argument("count"),
            callback: function () {
                Offer::factory(["recruiter_id" => $this->argument("recruiterId")])
                    ->create();
            },
        );
    }
}
