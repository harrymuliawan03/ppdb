<?php

namespace App\Console;

use App\Models\SppPayment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    protected $routeMiddleware = [
        'tenancy' => \App\Http\Middleware\TenancyAware::class,
    ];
    
    protected $middlewarePriority = [
        \App\Http\Middleware\TenancyAware::class, // registrasi middleware
        \App\Http\Middleware\Authenticate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        
        $schedule->call(function () {
            \Illuminate\Support\Facades\Log::info('test task scheduler by dandisy');
        })->weekly();

        $schedule->call(function () {
            $currentMonth = Carbon::now()->startOfMonth(); // Get the start of the current month

            // Get all active students
            $students = Student::all();
    
            foreach ($students as $student) {
                // Check if a payment for this student already exists for the current month
                $existingPayment = SppPayment::where('student_id', $student->id)
                    ->where('payment_month', $currentMonth)
                    ->first();
    
                // If no payment exists, create one
                if (!$existingPayment) {
                    SppPayment::create([
                        'student_id' => $student->id,
                        'payment_month' => $currentMonth,
                        'amount' => 200000, // Example SPP amount
                        'status' => 'pending',
                    ]);
                }
            }
        })->monthly();
        
        // $schedule->job(new \App\Jobs\ProcessJob)->monthly();
        $schedule->job(new \App\Jobs\ProcessJob)->weekly()->when(function () {
            return date('W') % 2;
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
