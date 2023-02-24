<?php

namespace App\Console\Commands;

use App\Models\Status;
use Illuminate\Console\Command;

class ChangeStatusesTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:change  {old} {new}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changing status name';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $oldName = $this->argument('old');
        $newName = $this->argument('new');

        $statuses = Status::where(['name'=> $oldName])->get();
        $count=count($statuses);
        $this->info("Pakeista statusų pavadinimų: $count");
        foreach ($statuses as $status) {
            $status->name = $newName;
            $status->save();
        }

        return Command::SUCCESS;
    }
}
