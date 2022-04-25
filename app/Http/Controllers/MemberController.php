<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $member = Member::latest()->paginate(5);
        // return view('pages.dashboard.member.index', compact('member'))->with('i', (request()->input('page', 1) - 1) * 5);
        if (request()->ajax()) {
            $query = Member::query();
            return DataTables::of($query)
                ->addColumn('action', function ($member) {
                    return '
                <a href="' . route('dashboard.member.edit', $member->id) . '" class="bg-blue-400 hover:bg-blue-500 text-white rounded-md px-4 py-1 md-2 inline-block">
                Update
                </a>
                <form class="inline-block" action="' . route('dashboard.member.destroy', $member->id) . '" method="POST">
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
        return view('pages.dashboard.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.dashboard.member.regmember');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'namamember' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'nomorhp' => 'required',
        ]);
        member::create($request->all());

        return redirect()->route('dashboard.member.index')->with('succes', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('pages.dashboard.member.formedit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'namamember' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => 'required',
            'nomorhp' => 'required',
        ]);

        $member->update($request->all());

        return redirect()->route('pages.dashboard.member.index')->with('succes', 'member Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('dashboard.member.index')->with('succes', 'member Berhasil di Hapus');
    }
}
