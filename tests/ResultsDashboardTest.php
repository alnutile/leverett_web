<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResultsDashboardTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function should_show_the_query_results()
    {
        $user = factory(\App\User::class)->create();

        $this->be($user);

        $this->call("GET", "dashboard/results");
    }
}
