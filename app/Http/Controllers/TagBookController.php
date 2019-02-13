<?php

namespace App\Http\Controllers;

use Storage;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exporters\Documentation\DocumentationExporter;
use App\Exporters\TagBookWebExporter;
use App\Flows\SaveFlows\TagBookSaveFlow;
use App\Http\Controllers\Controller;
use App\Services\Google\GoogleDocClient;
use App\Model\TagBook;
use App\Model\GaElement;
use App\Model\GaGoal;
use App\Model\TagBookWebAttribute;

class TagBookController extends Controller
{
    public function index()
    {
        $tagBooks = TagBook::all();

        return View::make('tag-book.index')
            ->with('tagBooks', $tagBooks);
    }

    public function create()
    {
        return View::make('tag-book.create')
            ->with('gaElementModel', new GaElement())
            ->with('gaGoalModel', new GaGoal())
            ->with('webAttribute', new TagBookWebAttribute());
    }

    public function store()
    {
        $rules = [
            'client_name' => 'required',
            'project_name' => 'required',
            'user_name' => 'required',
            'user_mail' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tag-books/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }

        $saveFlow = new TagBookSaveFlow(new TagBook(), Input::all());
        $saveFlow->save();

        Session::flash('message', 'Tag Book criado com sucesso!');

        return Redirect::to('tag-books');
    }

    public function show($id)
    {
        $tagBook = TagBook::find($id);

        return View::make('tag-book.show')
            ->with('tagBook', $tagBook);
    }

    public function edit($id)
    {
        $tagBook = TagBook::find($id);
        $webAttributes = $tagBook->webAttributes()->orderBy('order')->get();
        $gaElements = $tagBook->gaElements()->orderBy('order')->get();
        $gaGoals = $tagBook->gaGoals()->orderBy('order')->get();
        $references = $tagBook->references()->orderBy('order')->get();

        return View::make('tag-book.edit')
            ->with('webAttributes', $webAttributes)
            ->with('webAttribute', new TagBookWebAttribute())
            ->with('gaElementModel', new GaElement())
            ->with('gaGoalModel', new GaGoal())
            ->with('gaElements', $gaElements)
            ->with('gaGoals', $gaGoals)
            ->with('references', $references)
            ->with('tagBook', $tagBook);
    }

    public function update($id)
    {
        $rules = [
            'client_name' => 'required',
            'project_name' => 'required',
            'user_name' => 'required',
            'user_mail' => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tag-books/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        }

        $tagBook = TagBook::find($id);
        $saveFlow = new TagBookSaveFlow($tagBook, Input::all());
        $saveFlow->save();

        Session::flash('message', 'Tag Book alterado com sucesso!');

        return Redirect::to('tag-books');
    }

    public function destroy($id)
    {
        $tagBook = TagBook::find($id);
        $tagBook->delete();

        Session::flash('message', 'Tag Book deletado com sucesso!');

        return Redirect::to('tag-books/');
    }

    public function export($id)
    {
        Excel::store(new TagBookWebExporter($id), 'tagBook.xlsx');

        $client = (new GoogleDocClient())->getClient();

        $driveService = new \Google_Service_Drive($client);

        $test = new \Google_Service_Drive_DriveFile([
            'name' => 'Teste1',
            'mimeType' => 'application/vnd.google-apps.spreadsheet'
        ]);

        $content = Storage::get('tagBook.xlsx');

        $file = $driveService->files->create($test, [
            'data' => $content,
            'mimeType' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);

        /*
        $documentationExporter = new DocumentationExporter($id);
        $documentationExporter->export();
         */

        return Redirect::to('tag-books/');
    }
}
