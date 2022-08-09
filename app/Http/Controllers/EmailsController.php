<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search)
        {
            // Get the search value from the request
        $search = $request->search;
        $also = '%' . $search . '%';
    
        // Search in the title and body columns from the posts table
        $emails = Email::where('email', 'like',  $also)
            ->orderBy('id', 'desc')
            ->paginate(15);
        }else {
            $emails = Email::orderBy('id', 'desc')->paginate(15);
        }
        
        return view('emials.index', compact('emails'));
    }

    public function store(Request $request)
    {
        // Now get emails from the string by comma separated.
        $emails_array = explode(',', $request->emails);
        
        foreach ($emails_array as $email) {
            // If valid email, then do next step.
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    
                // Check if email is in the database
                $emailDB = Email::where('email', $email)->first();

                // If not exists in the database, then add
                if (empty($emailDB)) {
                    $emailModel = new Email();
                    $emailModel->email = $email;
                    $emailModel->save();
                }
            }
        }

        return back();
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->search;
        $also = '%' . $search . '%';
    
        // Search in the title and body columns from the posts table
        $emails = Email::orwhere('email', 'like',  $also)
            ->orderBy('id', 'desc')
            ->paginate(1);
    
        // Return the search view with the resluts compacted
        return view('emials.search', compact('emails'));
    }

}
