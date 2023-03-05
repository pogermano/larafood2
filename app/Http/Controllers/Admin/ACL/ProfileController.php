<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $repository;
     public function __construct(Profile $profile)
     {
         $this->repository = $profile;

     }

    public function index()
    {
        $profiles = $this->repository->paginate();
       // return view('admin.pages.profiles.index', ['profiles' => $profiles]); outra maneira
        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProfile $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $profile = $this->repository->find($id);
        // dd($profile);
        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $profile = $this->repository->find($id);
        // dd($profile);
        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProfile $request, string $id)
    {

        $profile = $this->repository->find($id);
        if(!$profile)
        return redirect()->back();

        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $profile = $this->repository->find($id);
        if(!$profile)
        return redirect()->back();

        $profile->delete();

        return redirect()->route('profiles.index');
    }

    public function search(Request $request)
    {
      //  dd($request);
        $filters = $request->except('_token');

        $profiles = $this->repository->search($request->filter);
        /**
         * Alternativa de implementação
         *
         *  $filters = $request->only('filter');

         *  $profiles = $this->repository
         *                   ->where(function($query) use ($request) {
         *                       if ($request->filter) {
         *                           $query->where('name', $request->filter);
         *                           $query->orWhere('description', 'LIKE', "%{$request->filter}%");
         *                       }
         *                   })
         *                   ->paginate();
         * return view('admin.pages.profiles.index', compact('profiles', 'filters'));
         */

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles,
            'filters' => $filters,
        ]);



    }
}
