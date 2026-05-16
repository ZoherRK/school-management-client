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

    private function http()
    {
        return Http::withToken(session('token'));
    }

    public function index()
    {
        $subjects = $this->http()->get($this->apiUrl)->json();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $teachers = $this->http()->get($this->teachersUrl)->json();
        return view('subjects.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $this->http()->post($this->apiUrl, $request->all());
        return redirect()->route('subjects.index');
    }

    public function edit(string $id)
    {
        $subject = $this->http()->get($this->apiUrl . '/' . $id)->json();
        $teachers = $this->http()->get($this->teachersUrl)->json();
        return view('subjects.edit', compact('subject', 'teachers'));
    }

    public function update(Request $request, string $id)
    {
        $this->http()->put($this->apiUrl . '/' . $id, $request->all());
        return redirect()->route('subjects.index');
    }

    public function destroy(string $id)
    {
        $this->http()->delete($this->apiUrl . '/' . $id);
        return redirect()->route('subjects.index');
    }
}