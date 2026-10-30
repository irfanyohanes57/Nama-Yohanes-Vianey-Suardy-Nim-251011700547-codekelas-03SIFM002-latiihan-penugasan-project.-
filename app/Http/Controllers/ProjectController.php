<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Tampilkan semua data di Admin Dashboard
    public function index()
    {
        $projects = Project::orderBy('id')->get();

        return view('admin.projects.index', compact('projects'));
    }

    // Form tambah data
    public function create()
    {
        return view('admin.projects.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'teknologi' => 'nullable|string|max:255',
            'status'    => 'nullable|string|max:100',
            'gambar'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('projects', 'public');
        }

        Project::create($data);

        return redirect('/admin')->with('success', 'Data berhasil ditambahkan');
    }

    // Form edit data
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // Simpan perubahan
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'teknologi' => 'nullable|string|max:255',
            'status'    => 'nullable|string|max:100',
            'gambar'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus gambar lama kalau ada
            if ($project->gambar) {
                Storage::disk('public')->delete($project->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('projects', 'public');
        }

        $project->update($data);

        return redirect('/admin')->with('success', 'Data berhasil diupdate');
    }

    // Hapus data
    public function destroy(Project $project)
    {
        if ($project->gambar) {
            Storage::disk('public')->delete($project->gambar);
        }

        $project->delete();

        return redirect('/admin')->with('success', 'Data berhasil dihapus');
    }
}
