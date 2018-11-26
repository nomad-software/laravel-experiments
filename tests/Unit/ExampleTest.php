<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function test_something()
    {
        $this->post("/migrations", [
            "migration" => "This is a test.",
        ]);
        
        $this->assertDatabaseHas("migrations", [
            "migration" => "This is a test.",
        ]);
    }
}
