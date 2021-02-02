<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $contacts = Contact::oldest()->get();
        return response()->json($contacts,200);

    }


    public function create(){

    }


    public function store(Request $request){

        $this->validate($request,[

            'form_name' => 'required',
            'text_field' => 'required',
            'number_field' => 'required',
            'date_field' => 'required',
            'textarea_field' => 'required'
        ]);

        $contact = Contact::create([

            'form_name' => $request->form_name,
            'text_field' => $request->text_field,
            'number_field' => $request->number_field,
            'date_field' => $request->date_field,
            'textarea_field' => $request->textarea_field
        ]);

        return response()->json('success',200);
    }


    public function edit(Contact $contact){

        if($contact){

            return response()->json($contact, 200);
        }else{

            return response()->json('failed', 404);
        }
    }


    // public function update(Request $request, Contact $contact){

    //     $this->validate($request, [

    //         'name' => "required|unique:contacts,name, $contact->id",
    //         'age' => "required",
    //         'date_of_birth' => "required",
    //         'message' => "required"
    //     ]);


    //     $contact.update([

    //         'name'=> $request->name,
    //         'age'=> $request->age,
    //         'date_of_birth'=> $request->date_of_birth,
    //         'message'=> $request->message

    //     ]);

    //     return response()->json('success',200);
    // }


    public function show(Contact $contact){
        
    }
}
