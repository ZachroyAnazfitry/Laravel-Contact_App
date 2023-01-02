<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\UpdateContactsRequest;
use App\Models\Contacts;
use App\Models\Company;


class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //previously got error, check again the single quote 'name'
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        // $companies = Company::get();
        // $contacts = Contacts::paginate(10);
        $contacts = Contacts::orderBy('id', 'desc')->where(function ($query){
            if ($companyId=request('company_id')) {
                $query->where('company_id', $companyId);
            }
        })->paginate(10);

        return view('contacts.index', compact('contacts','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //defined variable Contacts
        $contacts = new Contacts();

        //paste same code from index() method
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');

        return view('contacts.create',compact('companies', 'contacts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactsRequest $request)
    {
        //
        // dd($request->all());
        // dd($request->only('first_name', 'last_name'));
        // dd($request->except('first_name', 'last_name'));

        $request->validate([
        
             'first_name'=> 'required',
             'last_name'=> 'required',
             'email'=> 'required|email',
             'address'=> 'required',
             'company_id'=> 'required|exists:companies,id',

        ]);

        Contacts::create($request->all());

        return redirect('/contacts')->with('message', "Contact has been updated succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        //
        $contacts = Contacts::all();
        return view('contacts.show', compact('contacts'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        //using find(),get error
        $contacts = Contacts::findOrFail($contacts);
        // $contacts = Contacts::all();
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');

        return view('contacts.edit',compact('companies','contacts'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactsRequest  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactsRequest $request, Contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
