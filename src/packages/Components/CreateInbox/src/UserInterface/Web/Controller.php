<?php

namespace MyApp\Components\CreateInbox\UserInterface\Web;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use MyApp\Components\Tasks\UseCases\CreateInbox\InputData;
use MyApp\Components\Tasks\UseCases\CreateInbox\InputBoundary;

/**
 * Class Controller
 * @package MyApp\Components\CreateInbox\UserInterface\Web
 */
final class Controller extends BaseController
{
    use ValidatesRequests;

    /**
     * @param Request $request
     * @param InputBoundary $interactor
     */
    public function __invoke(Request $request, InputBoundary $interactor)
    {
        $validated = $this->validate($request, [
            'name' => 'required|string|max:255',
            'note' => 'string|nullable',
        ]);

        $input = new InputData($validated['name'], $validated['note'] ?? '');

        $interactor($input);
    }
}
