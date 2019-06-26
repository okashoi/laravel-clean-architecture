<?php

namespace MyApp\Web\Presenters\CreateInbox;

use Illuminate\View\Factory;
use MyApp\Web\Presenters\Presenter as BasePresenter;
use MyApp\Components\Tasks\UseCases\CreateInbox\NormalOutputData;
use MyApp\Components\Tasks\UseCases\CreateInbox\NormalOutputBoundary;

/**
 * Class CreateInboxPresenter
 * @package MyApp\Web\Presenters
 */
final class Presenter extends BasePresenter implements NormalOutputBoundary
{
    /**
     * @var Factory
     */
    private $view;

    /**
     * Presenter constructor.
     * @param Factory $view
     */
    public function __construct(Factory $view)
    {
        $this->view = $view;
    }

    /**
     * @param NormalOutputData $output
     */
    public function __invoke(NormalOutputData $output): void
    {
        $viewModel = new ViewModel(
            $output->taskId(),
            $output->taskName(),
            $output->taskNote(),
            );

        $this->respond($this->view->make('web::tasks.create', compact(['viewModel'])));
    }
}
