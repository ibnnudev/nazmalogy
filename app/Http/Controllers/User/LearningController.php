<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseChapterReviewInterface;
use App\Interfaces\LearningInterface;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PointInterface;
use App\Interfaces\UserCourseChapterLogInterface;
use App\Models\CourseChapter;
use App\Models\PointType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    private $learning;
    private $userCourseChapterLog;
    private $courseChapterReview;
    private $point;

    public function __construct(LearningInterface $learning, UserCourseChapterLogInterface $userCourseChapterLog, CourseChapterReviewInterface $courseChapterReview, PointInterface $point)
    {
        $this->learning             = $learning;
        $this->userCourseChapterLog = $userCourseChapterLog;
        $this->courseChapterReview  = $courseChapterReview;
        $this->point                = $point;
    }

    /* 
        Kode ini digunakan untuk mengakses halaman course yang sudah diambil oleh user. Paramater yang digunakan adalah playlist_id dan chapter_id.
    */
    public function chapter($playlist_id, $chapter_id)
    {
        $result = $this->learning->getByChapterId($chapter_id);
        return view('user.course.player', [
            'course'      => $result['course'],
            'chapter'     => $result['chapter'],
            'reviews'     => $result['chapter']['reviews'],
            'chapter_id'  => $chapter_id,
            'playlist_id' => $playlist_id,
        ]);
    }

    /* 
        Kode dibawah untuk menandai jika user telah menyelesaikan course
    */
    public function complete($playlist_id, $chapter_id, $finish_time)
    {
        // dd($finish_time);
        $user_id = auth()->user()->id;
        $this->userCourseChapterLog->store($user_id, $chapter_id, $finish_time);

        $chapter   = CourseChapter::where('id', $chapter_id)->first()->title;
        $pointType = PointType::where('name', 'watch_course')->first();

        // Find the existing point record
        $point = Point::where([
            ['user_id', auth()->user()->id],
            ['point_type_id', $pointType->id],
            ['description', 'watch course: ' . $chapter],
        ])->first();

        // Check if a point record exists
        if (!$point) {
            // Create a new point record
            Point::create([
                'user_id'       => auth()->user()->id,
                'amount'        => $pointType->amount,
                'point_type_id' => $pointType->id,
                'description'   => 'watch course: ' . $chapter,
            ]);
        } else {
            // Check if the existing point record is older than one day
            $createdDate = Carbon::parse($point->created_at);
            $currentDate = Carbon::now();

            if ($createdDate->diffInDays($currentDate) > 0) {
                // Create a new point record if the existing one is older than one day
                Point::create([
                    'user_id'       => auth()->user()->id,
                    'amount'        => $pointType->amount,
                    'point_type_id' => $pointType->id,
                    'description'   => 'watch course: ' . $chapter,
                ]);
            }
        }

        $result                 = $this->learning->getByChapterId($chapter_id);
        $result['next_chapter'] = $this->learning->getNextChapter($playlist_id, $chapter_id);

        if ($result['next_chapter']['type'] == 'chapter') {
            $playlist_id = $result['next_chapter']['playlist_id'];
            $chapter_id  = $result['next_chapter']['chapter_id'];
            return redirect()->route('user.learn.chapter', [$playlist_id, $chapter_id]);
        }

        if ($result['next_chapter']['type'] == 'quiz') {
            $playlist_id = $result['next_chapter']['playlist_id'];
            $quiz_id     = $result['next_chapter']['quiz_id'];
            return redirect()->route('user.learn.quiz', [$playlist_id, $quiz_id]);
        };

        // $user = Auth::user();

        // $pointType = PointType::where('name', 'finished_course')->first();
        // $point     = Point::where('user_id', auth()->user()->id)->latest()->first();
        // Point::create([
        //     'user_id'       => auth()->user()->id,
        //     'point_type_id' => $pointType->id,
        //     'amount'        => $pointType->amount,
        //     'description'   => 'finished course: ' . $result['course']['names'],
        // ]);


        return redirect()->route('user.learn.chapter', [$playlist_id, $result['next_chapter']['id']]);
    }

    /* 
        Fungsi dibawah untuk mengakses halaman quiz, 
        paramater yang digunakan adalah playlist_id dan quiz_id.
    */
    public function quiz($playlist_id, $quiz_id)
    {
        $user_id = auth()->user()->id;
        $result  = $this->learning->getByQuizId($playlist_id, $quiz_id);

        // check if user already answer the quiz
        $userQuizLog = $this->learning->getUserQuizLog($user_id, $quiz_id);

        if ($userQuizLog) {
            return redirect()->route('user.learn.result', [$playlist_id, $quiz_id]);
        }

        return view('user.course.quiz', [
            'course'      => $result['course'],
            'quiz'        => $result['quiz'],
            'playlist_id' => $playlist_id,
            'quiz_id'     => $result['quiz']['id'],
        ]);
    }

    public function question($playlist_id, $quiz_id)
    {
        $user_id   = auth()->user()->id;
        $result    = $this->learning->getByQuizId($playlist_id, $quiz_id);
        $questions = $result['quiz']['questions'];

        return view('user.course.question', [
            'questions'   => $questions,
            'course'      => $result['course'],
            'quiz'        => $result['quiz'],
            'quiz_id'     => $quiz_id,
            'playlist_id' => $playlist_id,
        ]);
    }

    public function answer($playlist_id, $quiz_id, Request $request)
    {
        $resultQuiz = $this->learning->answerQuiz($quiz_id, $request->except('_token'));

        if ($resultQuiz['is_passed'] == false) {
            return redirect()->route('user.learn.question', [$playlist_id, $quiz_id])->withInput()->withErrors([
                'incorrect_answer' => $resultQuiz['incorrect_answer'],
            ]);
        }

        $result       = $this->learning->getByQuizId($playlist_id, $quiz_id);
        $nextPlaylist = $this->learning->getNextPlaylist($playlist_id);

        if ($nextPlaylist == null) {
            $pointType = PointType::where('name', 'finished_course')->first();
            $point     = Point::where([
                ['user_id', auth()->user()->id],
                ['point_type_id', $pointType->id],
                ['description', 'finished course: ' . $result['course']['name']],
            ])->first();

            if (isset($point)) {
                Point::create([
                    'user_id'       => auth()->user()->id,
                    'point_type_id' => $pointType->id,
                    'amount'        => $pointType->amount,
                    'description'   => 'finished course: ' . $result['course']['name'],
                ]);
            }

            return view('user.course.answer', [
                'course'       => $result['course'],
                'quiz'         => $result['quiz'],
                'playlist_id'  => $playlist_id,
                'quiz_id'      => $quiz_id,
                'resultQuiz'   => $resultQuiz,
                'isLast'       => true,
                'nextPlaylist' => null,
                'nextChapter'  => null,
            ]);
        }

        return view('user.course.answer', [
            'course'       => $result['course'],
            'quiz'         => $result['quiz'],
            'playlist_id'  => $playlist_id,
            'quiz_id'      => $quiz_id,
            'resultQuiz'   => $resultQuiz,
            'nextPlaylist' => $nextPlaylist['type'] == 'chapter' ? $nextPlaylist['playlist_id'] : null,
            'nextChapter'  => $nextPlaylist['type'] == 'chapter' ? $nextPlaylist['chapter_id'] : null,
        ]);
    }

    public function replay($playlist_id, $quiz_id)
    {
        $user_id = auth()->user()->id;
        $result  = $this->learning->getByQuizId($playlist_id, $quiz_id);

        return view('user.course.quiz', [
            'course'      => $result['course'],
            'quiz'        => $result['quiz'],
            'playlist_id' => $playlist_id,
            'quiz_id'     => $result['quiz']['id'],
        ]);
    }

    public function result($playlist_id, $quiz_id)
    {
        $resultQuiz = $this->learning->getUserQuizLog(auth()->user()->id, $quiz_id);
        // dd($resultQuiz);

        $result       = $this->learning->getByQuizId($playlist_id, $quiz_id);
        $nextPlaylist = $this->learning->getNextPlaylist($playlist_id);
        // dd($nextPlaylist);

        if ($nextPlaylist == null) {
            $pointType = PointType::where('name', 'finished_course')->first();
            $point     = Point::where([
                ['user_id', auth()->user()->id],
                ['point_type_id', $pointType->id],
                ['description', 'finished course: ' . $result['course']['name']],
            ])->first();

            if (isset($point)) {
                Point::create([
                    'user_id'       => auth()->user()->id,
                    'point_type_id' => $pointType->id,
                    'amount'        => $pointType->amount,
                    'description'   => 'finished course: ' . $result['course']['name'],
                ]);
            }
            return view('user.course.answer', [
                'course'       => $result['course'],
                'quiz'         => $result['quiz'],
                'playlist_id'  => $playlist_id,
                'quiz_id'      => $quiz_id,
                'resultQuiz'   => $resultQuiz,
                'isLast'       => true,
                'nextPlaylist' => null,
                'nextChapter'  => null,
            ]);
        }

        return view('user.course.answer', [
            'course'       => $result['course'],
            'quiz'         => $result['quiz'],
            'playlist_id'  => $playlist_id,
            'quiz_id'      => $quiz_id,
            'resultQuiz'   => $resultQuiz,
            'nextPlaylist' => $nextPlaylist['type'] == 'chapter' ? $nextPlaylist['playlist_id'] : null,
            'nextChapter'  => $nextPlaylist['type'] == 'chapter' ? $nextPlaylist['chapter_id'] : null,
        ]);
    }

    public function comment($playlist_id, $chapter_id, Request $request)
    {
        $user_id = auth()->user()->id;
        $this->courseChapterReview->store($chapter_id, $user_id, $request->rating, $request->comment);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil memberikan komentar',
        ]);
    }
}
