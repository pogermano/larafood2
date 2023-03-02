<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    private $repository;



    // public function _construct(Plan $plan)
    // {

    //    $this->repository =  $plan;
    // }

    public function index()

    {
        $plans = Plan::latest()->paginate(); //$this->repository;
        //  dd($this->repository);
        // $plans = $this->repository->all();
        return view('admin.pages.plans.index', ['plans' => $plans,]);
    }


    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function show($url)
    {
        $plan = Plan::where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan'=>$plan
        ]);
    }

    public function delete($id)
    {
        $plan = Plan::find($id);
        if (!$plan)
            return redirect()->back();

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        //  dd($data);
        // $this->repository->create($data);
        $createPlan = Plan::create($data);
        //dd($createPlan);
        return redirect()->route('plans.index');
    }
}
