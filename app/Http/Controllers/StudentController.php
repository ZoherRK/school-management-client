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

    private function http()
    {
        return Http::withToken(session('token'));
    }

    public function index()
    {
        $students = $this->http()->get($this->apiUrl)->json();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->http()->post($this->apiUrl, $request->all());
        return redirect()->route('students.index');
    }

    public function edit(string $id)
    {
        $student = $this->http()->get($this->apiUrl . '/' . $id)->json();
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $this->http()->put($this->apiUrl . '/' . $id, $request->all());
        return redirect()->route('students.index');
    }

    public function destroy(string $id)
    {
        $this->http()->delete($this->apiUrl . '/' . $id);
        return redirect()->route('students.index');
    }
}