<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubjectController extends Controller
{
    private $apiUrl;
    private $teachersUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_BASE_URL') . '/api/subjects';
        $this->teachersUrl = env('API_BASE_URL') . '/api/teachers';
    }

    public function index()
    {
        $subjects = Http::get($this->apiUrl)->json();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $teachers = Http::get($this->teachersUrl)->json();
        return view('subjects.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        Http::post($this->apiUrl, $request->all());
        return redirect()->route('subjects.index');
    }

    public function edit(string $id)
    {
        $subject = Http::get($this->apiUrl . '/' . $id)->json();
        $teachers = Http::get($this->teachersUrl)->json();
        return view('subjects.edit', compact('subject', 'teachers'));
    }

    public function update(Request $request, string $id)
    {
        Http::put($this->apiUrl . '/' . $id, $request->all());
        return redirect()->route('subjects.index');
    }

    public function destroy(string $id)
    {
        Http::delete($this->apiUrl . '/' . $id);
        return redirect()->route('subjects.index');
    }
}