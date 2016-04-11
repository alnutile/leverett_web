<?php

use App\Result;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\File;

class ResultsRepositoryTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * @test
     */
    public function should_create_results()
    {
        $user = factory(\App\User::class)->create();

        $results_before = Result::all()->count();
        
        $payload = json_decode(File::get(base_path('tests/fixtures/incoming_payload_2.json')), true);

        $data    = $payload;

        $this->call('POST', sprintf('/api/v1/results?api_token=%s',
            $user->api_token), $data);

        $this->assertResponseStatus(200);
        
        $results_after = Result::all()->count();

        $this->assertGreaterThan($results_before, $results_after);

        $result = Result::orderBy('created_at', 'desc')->first();

        $this->assertNotNull($result->results);
    }
    
}
