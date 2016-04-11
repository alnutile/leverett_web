<?php

namespace App\Http\Controllers;

use App\Result;
use App\ResultsRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ResultsController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = Result::query();

        if($machine_id = $request->input('machine_id'))
        {
            $results->where('machine_id', $machine_id);
        }

        if($try = $request->input('tries'))
        {
            $results->where('tries', $try);
        }

        if($created_at = $request->input('created_at'))
        {
            $results->where('created_at', ">=", $created_at);
        }

        if($export = $request->input('export'))
        {
            $results = $results->orderBy('created_at', 'desc')->get();

            return Excel::create('levnet_results', function($excel) use($results) {

                $excel->sheet('Default', function($sheet) use($results) {

                    $sheet->fromModel($results);

                });

            })->export('xls');
        }

        $results = $results->orderBy('created_at', 'desc')->paginate(100);

        list($machine_ids, $tries, $created_at) = $this->getSelectLists($results);

        return view('results.index', compact('results', 'machine_ids', 'tries', 'created_at'));
    }

    protected function getSelectLists($results)
    {
        $results = $results->toArray();

        $machine_ids    = [];
        $tries          = [];
        $created_at     = [];

        foreach($results['data'] as $result)
        {
            $machine_ids[$result['machine_id']] = $result['machine_id'];
            $tries[$result['tries']]            = $result['tries'];
            $created_at[$result['created_at']]  = $result['created_at'];
        }

        return [$machine_ids, $tries, $created_at];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ResultsRepository $repository)
    {
        
        try 
        {
            $ip         = $request->getClientIp();

            $payload    = $request->input();

            //File::put(base_path('tests/fixtures/incoming.json'),
            //    json_encode($request->input(), JSON_PRETTY_PRINT));

            $repository->saveResults($payload, $ip);
            
            Log::info(sprintf("Success with request from IP %s", $ip));

            return Response::json([], 200);
        }
        catch (\Exception $e)
        {
            Log::info(sprintf("Error with request %s", $e->getMessage()));
            return Response::json([], 422);
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
