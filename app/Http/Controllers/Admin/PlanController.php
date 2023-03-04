<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;


/**
 * Os códigos comentados são referentes a outra forma de codificar sem
 * o repository
 *
 */
class PlanController extends Controller
{
    private $repository;



    public function __construct(Plan $plan)
    {

        $this->repository =  $plan;
    }

    public function index()

    {
        //$plans = Plan::latest()->paginate(); //$this->repository;
        //dd($this->repository->all());
        $plans = $this->repository->latest()->paginate();
        return view('admin.pages.plans.index', ['plans' => $plans,]);
    }


    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function delete($id)
    {
        // $plan = Plan::find($id);
        // if (!$plan)
        //     return redirect()->back();

        // $plan->delete();

        // return redirect()->route('plans.index');

        $plan = $this->repository
            ->with('details')
            ->where('id', $id)
            ->first();

        if (!$plan)
            return redirect()->back();

        // if ($plan->details->count() > 0) {
        //     return redirect()
        //         ->back()
        //         ->with('error', 'Existem detahes vinculados a esse plano, portanto não pode deletar');
        // }

        $plan->delete();

        return redirect()->route('plans.index');
    }
    public function edit($url)
    {
        // $plan = Plan::where('url', $url)->first();
        // //  dd($plan);
        // if (!$plan)
        //     return redirect()->back();

        // return view('admin.pages.plans.edit', ['plan' => $plan]);

        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdatePlan $request, $url)
    {
        // $plan = Plan::where('url', $url)->first();
        // //  dd($plan);
        // if (!$plan)
        //     return redirect()->back();
        // $plan->update($request->all());
        // // dd($request->all());


        // return redirect()->route('plans.index');

        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    public function store(StoreUpdatePlan $request)
    {
        //  dd($data);
        // $this->repository->create($data);
/*         $createPlan = Plan::create($request->all());
        //dd($createPlan);
        return redirect()->route('plans.index'); */
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }


    public function search(Request $request)
    {
        // $filters = $request->except('_token');
        // $plans = Plan::search($request->filter);

        // return view('admin.pages.plans.index', ['plans' => $plans, 'filters' => $filters]);

        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }
}
