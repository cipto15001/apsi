<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Parameter;
use DB;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Parameter $parameter
     * @return \Illuminate\Http\Response
     */
    public function create(Parameter $parameter)
    {
        return view('attributes.create')->with([
            'parameter' => $parameter
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Parameter                 $parameter
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(Request $request, Parameter $parameter)
    {
        DB::transaction(function () use ($request, $parameter) {
            $attribute = new Attribute([
                'parameter_id' => $parameter->id,
                'type' => $request->type,
                'name' => $request->name,
            ]);

            $options = null;
            if ($request->type == 'options') {
                $options = json_encode($request->options);
            }

            $attribute->options = $options;

            $attribute->save();
        });

        return redirect()->route('parameters.show', $parameter);
    }

    /**
     * Display the specified resource.
     *
     * @param  Parameter $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        return view('parameters.show')->with([
            'parameter' => $parameter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Parameter $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        return view('parameters.edit')
            ->with('parameter', $parameter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Parameter                $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter $parameter)
    {
        DB::transaction(function () use ($request, $parameter) {
            $parameter->update($request->all());
        });

        return redirect()->route('parameters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy(Attribute $attribute)
    {
        DB::transaction(function () use ($attribute) {
            $attribute->delete();
        });

        return back();
    }
}
