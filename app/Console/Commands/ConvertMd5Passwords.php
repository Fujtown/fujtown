<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ConvertMd5Passwords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:md5passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            // Check if the password is MD5 hashed (for example, 32 characters long)
            if (strlen($customer->password) === 32) {
                $originalPassword = $customer->password;

                // Rehash the password using bcrypt
                $customer->password = Hash::make($originalPassword);
                $customer->save();

                $this->info("Password converted for customer ID: {$customer->id}");
            }
        }

        $this->info('MD5 passwords conversion completed.');
        return 0;
    }
}
