<?php

namespace MyApp\Components\CreateInbox\UserInterface\Web;

use Illuminate\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use MyApp\Web\Presenters\Presenter as BasePresenter;
use MyApp\Components\Tasks\UseCases\CreateInbox\NormalOutputData;
use MyApp\Components\Tasks\UseCases\CreateInbox\NormalOutputBoundary;

/**
 * Class NormalPresenter
 * @package MyApp\Components\CreateInbox\UserInterface\Web
 */
final class NormalPresenter extends BasePresenter implements NormalOutputBoundary
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

    /**
     * @param mixed $response
     */
    public function respond($response): void
    {
        if (!$response instanceof Response && !$response instanceof JsonResponse) {
            $response = new Response($response);
        }

        app()->instance('response', $response);
    }
}
