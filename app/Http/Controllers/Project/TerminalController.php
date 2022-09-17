<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Http\Requests\SaveTerminalRequest as SaveRequest;

class TerminalController extends Controller
{
    public function index()
    {
        $paginated = Terminal::where('project_id', auth()->guard('project')->id())
            ->paginate(15);

        return view('project.terminal-index', compact('paginated'));
    }

    public function form($id = null)
    {
        $terminal = Terminal::getForProjectOrCreate($id);
        return view('project.terminal-form', compact('terminal'));
    }

    public function save(SaveRequest $request, $id = null)
    {
        $terminal = Terminal::getForProjectOrCreate($id);
        $terminal->project_id = auth()->guard('project')->id();
        $terminal->title = $request->post('title');
        $terminal->login = $request->post('login');
        $terminal->pincode = $request->post('pincode');
        if ($pass = $request->post('password')) {
            $terminal->password = bcrypt($pass);
        }
        $success = $terminal->save();
        if ($success) {
            return redirect()->route('project.terminals.form', ['id' => $terminal->id])
                ->with(['success' => 'Successfully saved!']);
        }
        return redirect()->back()
            ->withInput()
            ->withErrors(['msg' => 'Something went wrong']);
    }
}
