<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_BASE_URL') . '/api/teachers';
    }

    public function index()
    {
        $teachers = Http::get($this->apiUrl)->json();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        Http::post($this->apiUrl, $request->all());
        return redirect()->route('teachers.index');
    }

    public function edit(string $id)
    {
        $teacher = Http::get($this->apiUrl . '/' . $id)->json();
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, string $id)
    {
        Http::put($this->apiUrl . '/' . $id, $request->all());
        return redirect()->route('teachers.index');
    }

    public function destroy(string $id)
    {
        Http::delete($this->apiUrl . '/' . $id);
        return redirect()->route('teachers.index');
    }
}