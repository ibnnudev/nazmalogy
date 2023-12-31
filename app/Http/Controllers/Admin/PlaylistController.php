<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Interfaces\PlaylistInterface;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    private $playlist;
    private $course;

    public function __construct(PlaylistInterface $playlist, CourseInterface $course)
    {
        $this->playlist = $playlist;
        $this->course = $course;
    }

    public function index($course_id)
    {
        return view('admin.playlist.index', [
            'course'    => $this->course->getById($course_id),
            'playlists' => $this->playlist->getByCourseId($course_id),
            'courseId'  => $course_id
        ]);
    }

    public function show($id)
    {
        return response()->json($this->playlist->getById($id));
    }

    public function store($course_id, Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        try {
            $this->playlist->store(array_merge($request->all(), ['course_id' => $course_id]));
            return redirect()->route('admin.playlist.index', $course_id)->with('success', 'Playlist berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('admin.playlist.index', $course_id)->with('error', 'Playlist gagal ditambahkan');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        try {
            $this->playlist->update($id, $request->all());
            return redirect()->back()->with('success', 'Playlist berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Playlist gagal diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            $this->playlist->destroy($id);
            return redirect()->back()->with('success', 'Playlist berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Playlist gagal dihapus');
        }
    }
}
