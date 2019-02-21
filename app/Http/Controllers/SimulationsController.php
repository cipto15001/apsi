<?php

namespace App\Http\Controllers;

use App\Parameter;
use App\Simulation;
use DB;
use Illuminate\Http\Request;

class SimulationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simulations = Simulation::withCount(['jobs'])->with('parameters')->get();

        return view('simulations.index')
            ->with('simulations', $simulations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('simulations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $slug = str_slug($request->input('title'));
            $simulation = new Simulation($request->all());
            $simulation->slug = $slug;
            $simulation->save();
        });

        return redirect()->route('simulations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Simulation $simulation
     * @return \Illuminate\Http\Response
     */
    public function show(Simulation $simulation)
    {
        $parameters = [];
        foreach (Parameter::all() as $parameter) {
            $parameters += [$parameter->id => $parameter->name];
        }
        $parameters = collect($parameters);

        $simulationParams = [];
        foreach ($simulation->parameters as $parameter) {
            $simulationParams += [$parameter->id => $parameter->name];
        }

        return view('simulations.view')
            ->with([
                'simulation' => $simulation,
                'parameters' => $parameters->except(array_keys($simulationParams)),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Simulation $simulation
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulation $simulation)
    {
        return view('simulations.edit')
            ->with('simulation', $simulation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Simulation               $simulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simulation $simulation)
    {
        DB::transaction(function () use ($request, $simulation) {
            $new_slug = str_slug($request->input('title'));
            $simulation->update(['slug' => $new_slug]);
            $simulation->update($request->all());
        });

        return redirect()->route('simulations.show', $simulation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Simulation $simulation
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy(Simulation $simulation)
    {
        if ($simulation->jobs()->count() > 0) {
            return back()->withErrors('Sudah terdapat jobs yang dibuat, simulasi tidak dapat dihapus');
        }
        DB::transaction(function () use ($simulation) {
            $simulation->delete();
        });

        return redirect()->route('simulations.index');
    }

    public function update_simulation_parameters(Request $request, Simulation $simulation)
    {
        DB::transaction(function () use ($request, $simulation) {
            $parameters = $request->input('parameters');
            $simulation->parameters()->attach($parameters);
        });

        return redirect()->route('simulations.show', $simulation);
    }

    public function detach_simulation_parameter(Simulation $simulation, $id)
    {
        DB::transaction(function () use ($simulation, $id) {
            $simulation->parameters()->detach($id);
        });

        return redirect()->route('simulations.show', $simulation);
    }
}
