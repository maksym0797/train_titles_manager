<?php


namespace App\TitlesManager\Titles\Service;


use App\TitlesManager\Titles\Repository\TitleRepository;

/**
 * Class TitleService
 * @package App\TitlesManager\Titles\Service
 */
class TitleService
{
    /**
     * @var TitleRepository
     */
    private $titleRepository;

    /**
     * TitleService constructor.
     * @param TitleRepository $titleRepository
     */
    public function __construct(TitleRepository $titleRepository)
    {
        $this->titleRepository = $titleRepository;
    }

    /**
     * @param string|null $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTitlesPageByKeyword(?string $keyword)
    {
        return $this->titleRepository->findTitlesByKeyword($keyword ?: '');
    }
}
