<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Repositories\CommentsRepository;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class CommentsController
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{
    /**
     * @var CommentsRepository
     */
    private $commentsRepository;

    /**
     * CommentsController constructor.
     * @param CommentsRepository $commentsRepository
     */
    public function __construct(CommentsRepository $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }

    /**
     * @param Mentor $mentor
     * @param CommentStoreRequest $request
     * @return View
     */
    public function store(Mentor $mentor, CommentStoreRequest $request) {
        $id = Auth::guard('student')->user()['id'];

        if($id != null)
        {
            $doesHaveComment = $this->commentsRepository->model()
                ::where('mentor_id', $mentor['id'])
                ->where('student_id', $id)
                ->first();

            if($doesHaveComment == NULL)
            {
                $data = [
                    'body' => $request->getBody(),
                    'mentor_id' => $mentor['id'],
                    'student_id' => $id
                ];

                $this->commentsRepository->create($data);

                return redirect()->back()->with('status', 'Sėkmingai palikote atsiliepimą apie mentorių');
            }
;
            return redirect()->back()->withErrors(['comments' => 'Nepavyko pakomentuoti, Jūs jau esate pakomentavęs šį mentorių']);
        }

        return redirect()->back()->withErrors(['comments' => 'Nepavyko pakomentuoti, jūs nesate studentas']);
    }

    /**
     * @param Comment $comment
     */
    public function destroy (Comment $comment)
    {
        $comment->delete();

        return redirect()->back()
            ->with('status', 'Komentaras buvo sėkmingai pašalintas');
    }
}
