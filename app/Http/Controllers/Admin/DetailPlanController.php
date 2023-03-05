<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;
    public function __construct(DetailPlan $detailPlan, Plan $plan){
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
     if ( !$plan= $this->plan->where('url', $urlPlan)->first()){
        return redirect()->back();
     };
     //$details = $plan->details();
     $details = $plan->details()->paginate();
     return view('admin.pages.plans.details.index', [
        'plan'=>$plan,
        'details'=> $details,
     ]);
    }
  public function show($urlPlan, $IdDetail)
    {
        $plan= $this->plan->where('url', $urlPlan)->first();
        $details = $this->repository->find( $IdDetail);
       // dd($plan->details()->get());
      if ( !$plan || !$details){
        return redirect()->back();
     };


     return view('admin.pages.plans.details.show', [
        'plan'=>$plan,
        'details'=> $details,
     ]);
    }
  public function destroy($urlPlan, $IdDetail)
    {
        $plan= $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find( $IdDetail);

      if ( !$plan || !$detail){

        return redirect()->back();
     };

     $detail->delete();

   return redirect()->route('details.plan.index', $plan->url)
                    ->with('message', 'Registro deletado com sucesso!');
    }

    public function create($urlPlan)
    {
       // dd($urlPlan);
        if ( !$plan= $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
         };

        return view('admin.pages.plans.details.create', compact('plan'));
    }
    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {

        if ( !$plan= $this->plan->where('url', $urlPlan)->first()){
            return redirect()->back();
         };
   /*  Outra forma de fazer

        $data= $request->all();
        $data['plan_id'] = $plan->id;
        $this->repository->create($data); */

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    public function edit( $urlPlan, $idDetail)
    {
        $plan= $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

         if ( !$plan || !$detail){
            return redirect()->back();
         };


         return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail'=>$detail
         ]);


    }
    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan= $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($idDetail);

         if ( !$plan || !$detail){
            return redirect()->back();
         };

        // dd($request->all());
         $detail->update($request->all());

         return redirect()->route('details.plan.index', $plan->url);


    }












}
