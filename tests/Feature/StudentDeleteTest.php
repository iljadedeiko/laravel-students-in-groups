<?php

namespace Tests\Feature;

use App\Models\Student;
use Tests\TestCase;

class StudentDeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function student_delete_test()
    {
        $student = Student::first();
        $response = $this->delete('/students/delete/' . $student->id);

        $this->assertEquals(302, $response->getStatusCode());
    }
}
