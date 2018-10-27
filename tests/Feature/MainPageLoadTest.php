<?php

namespace Tests\Feature;

use Tests\TestCase;

class MainPageLoadTest extends TestCase
{
    public function testDoesMainPageLoadsCorrectly()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
