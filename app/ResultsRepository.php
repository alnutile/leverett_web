<?php


namespace App;


use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ResultsRepository
{

    protected $payload = [];

    protected $incoming_ip = false;
    
    public function saveResults($results_from_input, $ip)
    {

        try
        {
            $this->incoming_ip = $ip;

            $date = Carbon::now()->timestamp;

            File::put(base_path(sprintf('tests/fixtures/incoming_payload_%s.json', $date)),
                json_encode($results_from_input, JSON_PRETTY_PRINT));

            $this->transformIncomingPayload($results_from_input);

            $results = Result::create($this->payload);

            Log::info("Saving Payload", $this->payload);
            
            return $results;
        }
        catch (\Exception $e)
        {
            Log::info(sprintf("Error saving payload %s", $e->getMessage()));
            
            return sprintf("Error creating results %s", $e->getMessage());
        }

    }

    protected function transformIncomingPayload($incoming)
    {
        $this->payload['results']                               = (isset($incoming['results'])) ? $incoming['results'] : 'no results';
        $this->payload['machine_id']                            = (isset($incoming['machine'])) ? $incoming['machine'] : 'no machine id';
        $this->payload['api_version']                           = (isset($incoming['api_version'])) ? $incoming['api_version'] : 'v1';
        $this->payload['tries']                                 = (isset($incoming['tries'])) ? $incoming['tries'] : '1';
        $this->payload['ip']                                    = $this->incoming_ip;
        $this->payload['results_originally_created_at']         = (isset($incoming['created_at'])) ? $incoming['created_at'] : 'no created at date';
    }
}