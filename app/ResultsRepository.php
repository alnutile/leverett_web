<?php


namespace App;


class ResultsRepository
{

    protected $payload = [];

    
    public function saveResults($results_from_input, $ip)
    {

        try
        {
            $this->transformIncomingPayload($results_from_input);

            $results = Result::create($this->payload);

            return $results;
        }
        catch (\Exception $e)
        {
            return sprintf(sprintf("Error creating results %s", $e->getMessage()));
        }

    }

    protected function transformIncomingPayload($incoming)
    {
        $this->payload['results']                               = (isset($incoming['results'])) ? $incoming['results'] : 'no results';
        $this->payload['machine_id']                            = (isset($incoming['machine_id'])) ? $incoming['machine_id'] : 'no machine id';
        $this->payload['api_version']                           = (isset($incoming['api_version'])) ? $incoming['api_version'] : 'v1';
        $this->payload['tries']                                 = (isset($incoming['tries'])) ? $incoming['tries'] : '1';
        $this->payload['results_originally_created_at']         = (isset($incoming['created_at'])) ? $incoming['created_at'] : 'no created at date';
    }
}