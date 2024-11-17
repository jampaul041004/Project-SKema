<?php

namespace App\Http\Controllers;

use App\Models\Youth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class YouthController extends Controller
{
    // Display a listing of youths with search and filters
    public function index(Request $request)
    {
        $query = Youth::query();
        $youths = $query->get();

        $search = $request->input('search');
        $youths = Youth::when($search, function ($query, $search) {
            $query->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%");
        })->get();
    
        return view('database', compact('youths'));


    }

    // Dashboard data logic
    public function dashboard()
    {
        // Total youth count
        $totalYouth = Youth::count();
    
        // Registered Voters count
        $registeredVoters = Youth::where('registered_voter', true)->count();
    
        // Voted Last Election count
        $votedLastElection = Youth::where('voted_last_election', true)->count();
    
        // Attended KK Assembly count
        $attendedKKAssembly = Youth::where('attended_kk_assembly', true)->count();
    
        // Optional: You may want to count the attendees who did not attend KK Assembly if needed
        $assemblyAttendees = Youth::where('attended_kk_assembly', true)->count();
    
        // Charts Data
        $sexDistribution = Youth::select('sex', DB::raw('count(*) as total'))
            ->groupBy('sex')
            ->get();
    
        $sitioDistribution = Youth::select('sitio', DB::raw('count(*) as total'))
            ->groupBy('sitio')
            ->get();
    
        $civilStatusDistribution = Youth::select('civil_status', DB::raw('count(*) as total'))
            ->groupBy('civil_status')
            ->get();
    
        $youthClassificationDistribution = Youth::select('youth_classification', DB::raw('count(*) as total'))
            ->groupBy('youth_classification')
            ->get();
    
        $ageGroupDistribution = Youth::select('youth_age_group', DB::raw('count(*) as total'))
            ->groupBy('youth_age_group')
            ->get();
    
        // New: Highest Educational Attainment Distribution
        $educationAttainmentDistribution = Youth::select('highest_educational_attainment', DB::raw('count(*) as total'))
            ->groupBy('highest_educational_attainment')
            ->get();
    
        return view('dashboard', compact(
            'totalYouth',
            'registeredVoters',
            'votedLastElection',
            'attendedKKAssembly',
            'assemblyAttendees',
            'sexDistribution',
            'sitioDistribution',
            'civilStatusDistribution',
            'youthClassificationDistribution',
            'ageGroupDistribution',
            'educationAttainmentDistribution'  // Pass the new data to the view
        ));

        $search = request('search');
        $youths = Youth::when($search, function ($query, $search) {
            $query->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%");
        })->get();
    
        return view('dashboard', compact('youths'));
    }
    

    // Display all youths in database (no filters or pagination)
    public function database()
    {
        $youths = Youth::all();
        return view('database', compact('youths'));
    }

    // Store youth profile
    public function store(Request $request)
    {
        // Validate the incoming request data (exclude age from validation)
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'sex' => 'required|string',
            'civil_status' => 'required|string',
            'youth_classification' => 'required|string',
            'youth_age_group' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string|max:15',
            'sitio' => 'required|string',
            'highest_educational_attainment' => 'required|string',
            'work_status' => 'required|string',
            'registered_voter' => 'required|boolean',
            'voted_last_election' => 'required|boolean',
            'attended_kk_assembly' => 'required|boolean',
            'kk_assembly_count' => 'nullable|integer',
        ]);

        // Calculate the age from birthdate
        $birthdate = Carbon::parse($request->birthdate);
        $age = Carbon::now()->diffInYears($birthdate); // Calculate the age

        // Create a new Youth record, do not include 'age' in the request
        Youth::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            'civil_status' => $request->civil_status,
            'youth_classification' => $request->youth_classification,
            'youth_age_group' => $request->youth_age_group,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'sitio' => $request->sitio,
            'highest_educational_attainment' => $request->highest_educational_attainment,
            'work_status' => $request->work_status,
            'registered_voter' => $request->registered_voter,
            'voted_last_election' => $request->voted_last_election,
            'attended_kk_assembly' => $request->attended_kk_assembly,
            'kk_assembly_count' => $request->kk_assembly_count,
        ]);

        // Redirect back to the database page with a success message
        return redirect()->route('database')->with('success', 'Youth profile successfully created.');
    }

    // Display a specific youth profile (not implemented)
    public function show($id)
    {
        $youth = Youth::findOrFail($id);
        return response()->json($youth);
    }

    // Show the form for editing a specific youth profile
    public function edit($id)
    {
        $youth = Youth::findOrFail($id);
        return view('edit', compact('youth'));
    }
    
    public function create()
    {
        return view('create'); // This will load create.blade.php
    }

    public function update(Request $request, $id)
    {
        $youth = Youth::findOrFail($id);
        $youth->update($request->all());
        return redirect()->route('database')->with('success', 'Youth data updated successfully');
    }

    // Delete a youth profile
    public function destroy($id)
    {
        $youth = Youth::findOrFail($id);  // Find the youth by id
        $youth->delete();                 // Delete the youth record
    
        return redirect()->route('youths.index')->with('success', 'Youth profile deleted successfully.');
    }   
}

