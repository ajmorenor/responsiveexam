<?php

namespace App\Http\Controllers;
use App\Contact;
use Redirect;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function __construct(){}

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('updateContact', compact('contact'));
    }

    // Update contact   
    public function update(Request $request,$id)
    {
        $contact = Contact::find($id);
        $contact->fill($request->all());
        $contact->save();
    
        return Redirect::to('/home');
    
    }

    // Delete contact
    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return Redirect::to('/home');
    }

    // Add contact
    public function add()
    {
        return view('registerContact');
    }

    // Save contact
    public function save(Request $request)
    {
        $contact = new Contact;

        $contac = $contact->create($request->all());

        return Redirect::to('/home');
    }

    // Create contact
    protected function create(array $data)
    {
        return Contact::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'contactnumber' => $data['contactnumber'],
        ]);
    }

}

