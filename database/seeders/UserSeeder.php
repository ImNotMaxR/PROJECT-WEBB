<?php  
  
namespace Database\Seeders;  
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;  
use Illuminate\Database\Seeder;  
use App\Models\User; // Make sure to include the User model  
use Illuminate\Support\Facades\Hash; // Make sure to include the Hash facade  
  
class UserSeeder extends Seeder  
{  
    /**  
     * Run the database seeds.  
     */  
    public function run(): void  
    {  
        User::create([  
            'name' => 'user',  
            'email' => 'user@gmail.com',
            'password' => Hash::make('Maskgem12'), // Added comma here  
            'role' => 'user'  
        ]);  
    }  
}  
