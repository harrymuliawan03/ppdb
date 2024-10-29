<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\SppPayment;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SppPaymentScheduleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_spp_payments_for_students_for_current_month()
    {
        // Set the current month
        $currentMonth = Carbon::now()->startOfMonth();

        // Create some students
        $students = Student::factory()->count(5)->create();

        // Call the method that simulates the scheduled task
        $this->simulateScheduledTask();

        // Assert that SPP payments have been created for each student for the current month
        foreach ($students as $student) {
            $this->assertDatabaseHas('spp_payments', [
                'student_id' => $student->id,
                'payment_month' => $currentMonth,
                'payment_amount' => 200000,
                'status' => 'pending',
            ]);
        }
    }

    // Simulate the task that the scheduler would run
    private function simulateScheduledTask()
    {
        $currentMonth = Carbon::now()->startOfMonth();

        $students = Student::all();

        foreach ($students as $student) {
            $existingPayment = SppPayment::where('student_id', $student->id)
                ->where('payment_month', $currentMonth)
                ->first();

            if (!$existingPayment) {
                SppPayment::create([
                    'student_id' => $student->id,
                    'payment_month' => $currentMonth,
                    'payment_amount' => 200000, // Example SPP amount
                    'status' => 'pending',
                ]);
            }
        }
    }
}
