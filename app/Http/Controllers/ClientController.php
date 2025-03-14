<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Method to show the form for adding a new client
    public function create()
    {
        return view('clients.create'); // Return the view for the client creation form
    }

    // Method to store the new client data in the database
    public function store(Request $request)
    {
        // Validate the request data, including the image upload
        $request->validate([
            'name' => 'required|string', // Name field is required and should be a string
            'email' => 'required|email|unique:clients,email', // Email should be unique
            'telephone' => 'required|string', // Telephone field is required and should be a string
            'address' => 'required|string', // Address field is required and should be a string
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // File upload validation (image types)
        ]);

        // Handle the file upload
        $filePath = null;
        if ($request->hasFile('company_logo')) {
            // Get the uploaded file
            $file = $request->file('company_logo');

            // Store the file in the 'company_logos' folder within the 'public' disk
            $filePath = $file->store('company_logos', 'public'); // 'public' disk stores the file under storage/app/public
        }

        // Create a new client and store it in the database
        Client::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'address' => $request->input('address'),
            'company_logo' => $filePath, // Store the file path in the database
        ]);

        // Redirect back with a success message
        return redirect()->route('clients.add')->with('success', 'Client added successfully!');
    }
}

            
