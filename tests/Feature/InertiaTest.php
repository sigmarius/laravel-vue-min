<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\Assert;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class InertiaTest extends TestCase
{
    public function test_users_index_component()
    {
        $this->get('/users')
            ->assertInertia(function (AssertableInertia $page) {
               $page->component('Users/Index')
                ->has('users')
                ->has('title')
                ->where('title', 'Users')
                ->has('users.data')
                ->has('users.links');
            });
    }
}
