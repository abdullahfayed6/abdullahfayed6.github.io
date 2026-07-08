<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use App\Models\Message;
use App\Models\Skill;
use App\Models\ResumeItem;
use App\Models\Achievement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        
        // Fetch settings and make them accessible
        $settings = Setting::pluck('value', 'key')->all();

        // Fetch skills grouped by category
        $skills = Skill::all()->groupBy('category')->all();

        // Fetch resume items grouped by section
        $resume = ResumeItem::orderBy('order')->get()->groupBy('section')->all();

        // Fetch achievements
        $achievements = Achievement::all();

        return view('index', compact('projects', 'settings', 'skills', 'resume', 'achievements'));
    }

    public function portfolioDetails($id)
    {
        $project = Project::findOrFail($id);
        
        return view('portfolio-details', compact('project'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return redirect()->back()->with('success', 'Thank you! Your message has been received.');
    }
}
