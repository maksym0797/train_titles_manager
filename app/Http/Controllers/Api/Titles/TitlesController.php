<?php


namespace App\Http\Controllers\Api\Titles;


use App\Http\Controllers\Controller;
use App\TitlesManager\Titles\Service\TitleService;
use App\TitlesManager\Titles\Transformer\TitleTransformer;
use Illuminate\Http\Request;

/**
 * Class TitlesController
 * @package App\Http\Controllers\Api\Titles
 */
class TitlesController extends Controller
{
    /**
     * @var TitleService
     */
    private $titleService;
    /**
     * @var TitleTransformer
     */
    private $titleTransformer;

    /**
     * TitlesController constructor.
     * @param TitleService $titleService
     * @param TitleTransformer $titleTransformer
     */
    public function __construct(TitleService $titleService, TitleTransformer $titleTransformer)
    {
        $this->titleService = $titleService;
        $this->titleTransformer = $titleTransformer;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        return response()->json(
            array_map(
                [$this->titleTransformer, 'transform'],
                $this->titleService->getTitlesPageByKeyword($request->get('q', ''))->items()
            )
        );
    }
}
