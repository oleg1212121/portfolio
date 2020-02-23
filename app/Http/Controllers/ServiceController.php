<?php

namespace App\Http\Controllers;

use App\Models\NeuralInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
{

    protected $expected = 0.9;
    protected $learningRate = 0.1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index');
    }

    public function getHash(Request $request)
    {
        return response(Hash::make($request->value), 200);
    }

    public function calculator( Request $request)
    {

        $data = $request->only('sport','vacation','medicine','work-form','salary','food', 'expected', 'learning');

        $neural = NeuralInput::select('name','weight')->get()->toArray();
        $output = 0;
//        dd($data);
        foreach ($neural as $item) {
            $current = (int) ($data[$item['name']] ?? 0);
            $output += $current*$item['weight'];
        }

        $output = $this->sigmoid($output);
        dump($output);

        if(isset($data['learning']) && ($data['learning'] > 0)){
            $this->expected = $data['expected'];
            $this->reverseCorrection($output, $neural, $data);
        }else{
            if($output >= $this->expected){
                dd('yes');
            }else{
                dd('no');
            }
        }
        dd('end');

    }

    protected function sigmoid(float $int)
    {
        return 1/(1 + pow(M_E ,-$int));
    }

    public function reverseCorrection(float $output, $neural, $data)
    {
        $error = $output - $this->expected;
        $weightsDelta = $error*($this->sigmoid($output)*(1 - $this->sigmoid($output)));
        foreach ($neural as $item) {
            $current = (int) ($data[$item['name']] ?? 0);
            $output += $current*$item['weight'];

            $correction = $item['weight'] - $current * $weightsDelta * $this->learningRate;
            // todo: transaction
            NeuralInput::where('name', $item['name'])->first()->update(['weight' => $correction]);
        }

    }
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
