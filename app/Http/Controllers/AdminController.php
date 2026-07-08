<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use App\Models\Message;
use App\Models\Skill;
use App\Models\ResumeItem;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function dashboard()
    {
        $projectsCount = Project::count();
        $messagesCount = Message::count();
        $recentMessages = Message::latest()->limit(5)->get();
        return view('admin.dashboard', compact('projectsCount', 'messagesCount', 'recentMessages'));
    }

    // Projects CRUD
    public function projectsIndex()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function projectsCreate()
    {
        return view('admin.projects.form');
    }

    public function projectsStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'github_url' => 'nullable|url|max:255',
            'project_url' => 'nullable|url|max:255',
            'role' => 'nullable|string|max:255',
            'project_date' => 'nullable|string|max:255',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $data['image'] = 'uploads/projects/' . $filename;
        }

        // Handle key features
        $features = [];
        if ($request->has('features')) {
            foreach ($request->input('features') as $f) {
                if (!empty($f['title'])) {
                    $features[] = [
                        'title' => $f['title'],
                        'description' => $f['description'] ?? '',
                        'icon' => $f['icon'] ?? 'bi-check-circle-fill',
                    ];
                }
            }
        }
        $data['key_features'] = $features;

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function projectsEdit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function projectsUpdate(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'github_url' => 'nullable|url|max:255',
            'project_url' => 'nullable|url|max:255',
            'role' => 'nullable|string|max:255',
            'project_date' => 'nullable|string|max:255',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && File::exists(public_path($project->image))) {
                File::delete(public_path($project->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $data['image'] = 'uploads/projects/' . $filename;
        }

        // Handle key features
        $features = [];
        if ($request->has('features')) {
            foreach ($request->input('features') as $f) {
                if (!empty($f['title'])) {
                    $features[] = [
                        'title' => $f['title'],
                        'description' => $f['description'] ?? '',
                        'icon' => $f['icon'] ?? 'bi-check-circle-fill',
                    ];
                }
            }
        }
        $data['key_features'] = $features;

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function projectsDestroy(Project $project)
    {
        if ($project->image && File::exists(public_path($project->image))) {
            File::delete(public_path($project->image));
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }

    // Skills CRUD
    public function skillsIndex()
    {
        $skills = Skill::all()->groupBy('category');
        return view('admin.skills', compact('skills'));
    }

    public function skillsStore(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill added successfully!');
    }

    public function skillsDestroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully!');
    }

    // Resume Items CRUD
    public function resumeIndex()
    {
        $resumeItems = ResumeItem::orderBy('section')->orderBy('order')->get()->groupBy('section');
        return view('admin.resume.index', compact('resumeItems'));
    }

    public function resumeCreate()
    {
        return view('admin.resume.form');
    }

    public function resumeStore(Request $request)
    {
        $validated = $request->validate([
            'section' => 'required|string|in:experience,internship,education,volunteering',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        ResumeItem::create($validated);

        return redirect()->route('admin.resume.index')->with('success', 'Resume item created successfully!');
    }

    public function resumeEdit(ResumeItem $item)
    {
        return view('admin.resume.form', compact('item'));
    }

    public function resumeUpdate(Request $request, ResumeItem $item)
    {
        $validated = $request->validate([
            'section' => 'required|string|in:experience,internship,education,volunteering',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        $item->update($validated);

        return redirect()->route('admin.resume.index')->with('success', 'Resume item updated successfully!');
    }

    public function resumeDestroy(ResumeItem $item)
    {
        $item->delete();
        return redirect()->route('admin.resume.index')->with('success', 'Resume item deleted successfully!');
    }

    // Achievements CRUD
    public function achievementsIndex()
    {
        $achievements = Achievement::latest()->get();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function achievementsCreate()
    {
        return view('admin.achievements.form');
    }

    public function achievementsStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'required|string',
            'is_highlighted' => 'boolean',
        ]);

        $data = $validated;
        $data['is_highlighted'] = $request->boolean('is_highlighted');

        Achievement::create($data);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created successfully!');
    }

    public function achievementsEdit(Achievement $achievement)
    {
        return view('admin.achievements.form', compact('achievement'));
    }

    public function achievementsUpdate(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'description' => 'required|string',
            'is_highlighted' => 'boolean',
        ]);

        $data = $validated;
        $data['is_highlighted'] = $request->boolean('is_highlighted');

        $achievement->update($data);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated successfully!');
    }

    public function achievementsDestroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully!');
    }

    // Settings
    public function settingsEdit()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.settings', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $data = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_summary' => 'required|string',
            'about_summary' => 'required|string',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'cv_file' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB PDF
            'typed_items' => 'required|string|max:255',
        ]);

        // Extract cv_file out of settings key updating loop
        $cvFile = $request->file('cv_file');
        unset($data['cv_file']);

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        // Handle CV upload
        if ($cvFile) {
            // Ensure folder exists
            if (!File::exists(public_path('assets/resume'))) {
                File::makeDirectory(public_path('assets/resume'), 0755, true);
            }
            $filename = 'cv_' . time() . '.pdf'; // add time to avoid cache issues
            $cvFile->move(public_path('assets/resume'), $filename);
            Setting::set('cv_file', 'assets/resume/' . $filename);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully!');
    }

    // Messages
    public function messagesIndex()
    {
        $messages = Message::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function messagesDestroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully!');
    }
}
