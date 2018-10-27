<?php

namespace Tests\Feature;

use Tests\TestCase;

class GuestUserRedirectionTest extends TestCase
{
    public function testDoesAdminPanelRedirectsGuest()
    {
        $this->get('/users')->assertSee('login');
    }

    public function testDoesMentorPanelRedirectsGuest()
    {
        $this->get('/mentors')->assertSee('login');
    }

    public function testDoesStudentPanelRedirectsGuest()
    {
        $this->get('/students')->assertSee('login');
    }
}
