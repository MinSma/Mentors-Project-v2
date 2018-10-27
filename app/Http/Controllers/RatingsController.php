<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingStoreRequest;
use App\Models\Mentor;
use App\Repositories\RatingsRepository;
use App\Repositories\StudentsRepository;
use Illuminate\Support\Facades\Auth;


/**
 * Class RatingController
 * @package App\Http\Controllers
 */
class RatingsController extends Controller
{
    /**
     * @var RatingsRepository
     */
    private $ratingsRepository;

    /**
     * @var StudentsRepository
     */
    private $studentsRepository;

    /**
     * RatingController constructor.
     * @param RatingsRepository $ratingsRepository
     * @param StudentsRepository $studentsRepository
     */
    public function __construct(RatingsRepository $ratingsRepository, StudentsRepository $studentsRepository)
    {
        $this->ratingsRepository = $ratingsRepository;
        $this->studentsRepository = $studentsRepository;
    }

    /**
     * @param Mentor $mentor
     * @param RatingStoreRequest $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Mentor $mentor, RatingStoreRequest $request) {
        $id = Auth::guard('student')->user()['id'];

        if($id != null)
        {
            $doesHaveRating = $this->ratingsRepository->model()
                ::where('mentor_id', $mentor['id'])
                ->where('student_id', $id)
                ->first();

            if($doesHaveRating == NULL)
            {
                $data = [
                    'rating' => $request->getRating(),
                    'mentor_id' => $mentor['id'],
                    'student_id' => $id
                ];

                $howManyRatingsMentorHave = $this->ratingsRepository->model()
                    ::where('mentor_id', $mentor['id'])->count();

                $newRating = ($mentor['rating'] + $request->getRating()) / ($howManyRatingsMentorHave + 1);

                $mentor->update([
                    'rating' => $newRating
                ]);

                $this->ratingsRepository->create($data);

                return redirect()->back()->withSuccess('Sėkmingai įvertinote mentorių');
            }

            return redirect()->back()->withErrors('Nepavyko įvertinti, Jūs jau esate įvertinęs šį mentorių');
        }

        return redirect()->back()->withErrors('Nepavyko įvertinti, jūs nesate studentas');
    }
}
