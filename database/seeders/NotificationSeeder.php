<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        Notification::create([
            'user_id' => 1,
            'title' => 'System Update',
            'message' => 'The system will undergo maintenance tonight from 12 AM to 2 AM.',
        ]);

        Notification::create([
            'user_id' => 1,
            'title' => 'New Feature Released',
            'message' => 'A new dashboard feature has been added! Check it out in your profile settings.',
        ]);

        Notification::create([
            'user_id' => 2,
            'title' => 'Account Suspended',
            'message' => 'Your account has been temporarily suspended. Please contact support for more details.',
        ]);

        Notification::create([
            'user_id' => 3,
            'title' => 'Password Change Required',
            'message' => 'Your password has expired. Please update your password to continue using the system.',
        ]);
    }
}
