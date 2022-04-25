<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Buku;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Buku::query();
            return DataTables::of($query)
                ->addColumn('action', function ($buku) {
                    return '
                    <a href="' . route('dashboard.buku.edit', $buku->id) . '" class="bg-blue-400 hover:bg-blue-500 text-white rounded-md px-4 py-1 md-2 inline-block">
                    Update
                    </a>
                    <form class="inline-block" action="' . route('dashboard.buku.destroy', $buku->id) . '" method="POST">
                        <button class="bg-red-400 hover:bg-red-500 text-white rounded-md px-4 py-1 md-2">
                            Delete
                        </button>
                    ' . method_field('delete') . csrf_field() . '
                    </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.buku.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {
        $data = $request->all();

        Buku::create($data);
        return redirect()->route('dashboard.buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('pages.dashboard.buku.update', [
            'buku' => $buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BukuRequest $request, Buku $buku)
    {
        $data = $request->all();

        $buku->update($data);

        return redirect()->route('dashboard.buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('dashboard.buku.index');
    }
}
