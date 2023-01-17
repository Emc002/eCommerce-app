<?php

namespace App\Http\Controllers;

use App\Exports\TicketsExport;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Carbon\Carbon;
use Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use PDF;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        return view('tickets.index', compact('tickets', 'request', 'data'));

    }

    public function create()
    {
        $category = Category::all();
        return view('tickets.create', compact('category'));
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|max:255',
            'priority' => 'required|max:255',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'user_id' => 'required|max:255',
            'category' => 'required|array',
        ]);

        $image_path = $request->file('file')->store('images', 'public');
        $validated['file'] = $image_path;


        try {
            DB::transaction(function () use ($validated) {
                $category = $validated['category'];

                $tickets = Ticket::create($validated);

                foreach ($category as $cat) {
                    $insert[] = [
                        'category_id' => $cat,
                        'ticket_id' => $tickets->id,
                        'created_at' => now()->toDateTimeString(),
                    ];
                }

                TicketCategory::insert($insert);
            });
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect('/tickets');
    }

    public function edit(Ticket $ticket)
    {
        $ticket = Ticket::find($ticket->id);
        $tickets = $ticket->category()->get();
        $category = Category::get();

        return view('tickets.edit', compact('ticket', 'category', 'tickets'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|max:255',
            'priority' => 'required|max:255',
            'file' => 'required|max:255',
            'user_id' => 'required|max:255',
            'category' => 'required|array',
        ]);
        try {
            DB::transaction(function () use ($validated, $id, $request) {
                $ticket = Ticket::find($id);
                $ticket->fill($request->post())->save();

                foreach ($category as $cat) {
                    $insert[] = [
                        'category_id' => $cat,
                        'ticket_id' => $ticket->id,
                        'created_at' => now()->toDateTimeString(),
                    ];
                }
                TicketCategory::where('ticket_id', $id)->delete();
                TicketCategory::insert($insert);
            });
        } catch (\Throwable $th) {
        }
        return redirect('/tickets');
    }
    public function destroy($id)
    {
        $name = Ticket::find($id);
        $image_path = storage_path().'/app/public/'.$name->file;
        unlink($image_path);
        $name->delete();
        return redirect('/tickets');
    }

    public function export()
    {
        return Excel::download(new TicketsExport, 'Tickets.xlsx');
    }

    public function preview()
    {
        return view('pdf.chart');
    }

    public function exportpdf()
    {

        $ticket = Ticket::all();
        $pdf = PDF::loadview('ticket_pdf', ['ticket' => $ticket]);
        return $pdf->download('laporan-ticket.pdf');
    }

    public function chart()
    {
        $ticket = Ticket::all();
        $OPEN = 0;
        $REJECT = 0;
        $WATING = 0;
        $CLOSED = 0;

        $data['OPEN'] = 0;
        $data['CLOSED'] = 0;
        $data['WAITING'] = 0;
        $data['REJECT'] = 0;

        foreach ($ticket as $tick) {
            if ($tick->status == 'OPEN') {
                $data['OPEN'] = $OPEN += 1;
            } elseif ($tick->status == 'CLOSED') {
                $data['CLOSED'] = $CLOSED += 1;
            } elseif ($tick->status == 'WAITING') {
                $data['WAITING'] = $WATING += 1;
            } elseif ($tick->status == 'REJECT') {
                $data['REJECT'] = $REJECT += 1;
            }
        }

        return view('home', compact('data'));
    }
}
