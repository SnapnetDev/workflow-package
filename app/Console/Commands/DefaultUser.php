<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class DefaultUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'default:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        if (!User::fetchV2()->where('email','admin@snapnet.com.ng')->exists()){
            $user = new User;
            $user->email = 'admin@snapnet.com.ng';
            $user->password = Hash::make('password123');
            $user->phone_num = '090000000000';
            $user->save();
        }
        $this->info('Default user created');
        return 0;
    }

}
