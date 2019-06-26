<?php

namespace MyApp\Web\Controllers;

use Illuminate\Http\Request;
use MyApp\Components\Tasks\UseCases\CreateInbox\InputData;
use MyApp\Components\Tasks\UseCases\CreateInbox\InputBoundary;

/**
 * Class CreateInbox
 * @package MyApp\Web\Controllers
 */
final class CreateInbox extends Controller
{
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
