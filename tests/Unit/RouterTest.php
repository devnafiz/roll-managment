<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->assertTrue(true);
        $response=$this->get('/');
        $response->assertStatus(404);
    }
}
