<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Contact;
use App\Models\ContactImage;
use App\Helpers\CustomUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'rol.admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.contact.index', ['contacts' => $contacts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact) {
        return view('dashboard.contact.show', ['contact' => $contact]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->action([ContactController::class, 'index'])->with('status', 'Data deteted!');
    }


}
