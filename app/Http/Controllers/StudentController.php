<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_BASE_URL') . '/api/students';
    }

    public function index()
    {
        $students = Http::get($this->apiUrl)->json();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        Http::post($this->apiUrl, $request->all());
        return redirect()->route('students.index');
    }

    public function edit(string $id)
    {
        $student = Http::get($this->apiUrl . '/' . $id)->json();
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        Http::put($this->apiUrl . '/' . $id, $request->all());
        return redirect()->route('students.index');
    }

    public function destroy(string $id)
    {
        Http::delete($this->apiUrl . '/' . $id);
        return redirect()->route('students.index');
    }
}