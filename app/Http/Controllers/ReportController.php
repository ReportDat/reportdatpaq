<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Http\Request;
use App\Imports\ReportsImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ReportController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('report/index', compact("reports"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $report = new Report();

        $report->date_purchase = $request->date_purchase;
        $report->store = $request->store;
        $report->document_number = $request->document_number;
        $report->name = $request->name;
        $report->phone = $request->phone;
        $report->guide_number = $request->guide_number;
        $report->conveyor = $request->conveyor;
        $report->city = $request->city;
        $report->address = $request->address;
        $report->debt_value = $request->debt_value;
        $report->product = $request->product;
        $report->shipping_value = $request->shipping_value;
        $report->reason = $request->reason;
        $report->is_trustworthy = $request->has('is_trustworthy');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $pathImage = $image->store('public/reports');
            $extension = $image->getClientOriginalExtension();

            $fileName = pathinfo($pathImage, PATHINFO_FILENAME);
            $report->image = $fileName . '.' . $extension;
        }

        $report->save();

        return redirect()->route("report.index")->with(['success' => 'Creación realizada' , 'reportId' => $report->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('report/edit', ['report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->city = $request->city;
        $report->address = $request->address;
        $report->debt_value = $request->debt_value;
        $report->product = $request->product;
        $report->shipping_value = $request->shipping_value;
        $report->reason = $request->reason;
        $report->is_trustworthy = $request->has('is_trustworthy');

        if ($request->hasFile('image')) {
            $filePath = 'public/reports/' . $report->image;

            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }

            $image = $request->file('image');

            $pathImage = $image->store('public/reports');
            $extension = $image->getClientOriginalExtension();

            $fileName = pathinfo($pathImage, PATHINFO_FILENAME);
            $report->image = $fileName . '.' . $extension;
        }

        $report->save();

        return redirect()->route("report.index")->with('success', 'Actualización realizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function import(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            Excel::import(new ReportsImport, $request->file('excel_file'));
        }

        return redirect()->route("report.index")->with('success', 'Importación realizada');
    }

    public function homeIndex()
    {
        $reports = Report::all();

        return view('report/index', compact("reports"));
    }

    public function downloadImage(Report $report)
    {
        $path = public_path('storage/reports/' . $report->image);

        $headers = [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename="' . $report->image . '"',
        ];

        return response()->download($path, $report->image, $headers);
    }
}
