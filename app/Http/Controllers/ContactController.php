<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Client;

class ContactController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();
        return view("index",compact("contacts"));
    }
    
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate(request(),[
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = request('name');
        $contact->surname = request('surname');
        $contact->email = request('email');
        $contact->phone = request('phone'); 
        $contact->status = request('status'); 

        $contact->save();
        return response()->json($contact);
        
    }

    public function update(Request $request)
    {
        //return $request->all();
      
       $contact = Contact::find($request->id);
       $contact->name = $request->name;
       $contact->surname = $request->surname;
       $contact->email = $request->email;
       $contact->phone = $request->phone;
       $contact->status = $request->status;
       $contact->save();

       return response()->json($contact);
    }
    
    public function destroy($id)
    {
       //return $request->all();
        $contact = Contact::find($id);
        $contact ->delete();
        return response()->json($contact);
    }
    
}
