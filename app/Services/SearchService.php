<?php
declare(strict_types = 1);

namespace App\Services;
use App\Repositories\LessonsRepository;
use Illuminate\Http\Request;
use App\Repositories\MentorsRepository;

/**
 * Class SearchService
 * @package App\Services
 */
class SearchService
{
    /**
     * @var LessonsRepository
     */
    private $lessonsRepository;

    /**
     * SearchService constructor.
     * @param LessonsRepository $lessonsRepository
     */
    public function __construct(LessonsRepository $lessonsRepository)
    {
        $this->lessonsRepository = $lessonsRepository;
    }

    /**
     * /**
     * @param Request $request
     * @return static
     */
    public function getLessons(Request $request)
    {
        $topic = $request->get('subject');

        if($topic == 'all') {
            return $this->lessonsRepository->model()::paginate(10);
        }
        else {
                return $this->lessonsRepository->model()::where('subject', 'like', $topic)->paginate(10);
        }
    }
}