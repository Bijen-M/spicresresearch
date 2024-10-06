<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\PortfolioCreate;
use App\Http\Requests\PortfolioUpdate;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    
    protected $portfolio;

    public function __construct(Portfolio $portfolio) {
        $this->portfolio = $portfolio;
    }
    
    public function index() {
        $breadcrumb = breadcrumb(['portfolios']);
        $portfolios = $this->portfolio->get();
        return view('admin.portfolio.index', compact('portfolios', 'breadcrumb'));
    }

    public function trash() {
        $breadcrumb = breadcrumb([route('portfolio.index') => 'portfolios', 'trash']);
        $portfolios = $this->portfolio->onlyTrashed()->get();
        return view('admin.portfolio.index', compact('portfolios', 'breadcrumb'));
    }

    public function withTrash() {
        $breadcrumb = breadcrumb([route('portfolio.index') => 'portfolios', 'all']);
        $portfolios = $this->portfolio->withTrashed()->get();
        return view('admin.portfolio.index', compact('portfolios', 'breadcrumb'));
    }
    
    public function restore($id) {
        $this->portfolio->where('id', $id)->restore();
        return redirect()->back()->with('success', 'Successfully Restored.');
    }
    
    public function delete($id) {
        $portfolio = $this->portfolio->withTrashed()->findOrFail($id);
        // dd($portfolio->picture);
        $this->deleteImages($portfolio);
        $portfolio->forceDelete();
        return redirect()->back()->with('success', 'Permanently Deleted.');
    }

    public function create() {
        $breadcrumb = breadcrumb([route('portfolio.index') => 'portfolios', 'create']);
        return view('admin.portfolio.form', compact('breadcrumb'));
    }

    public function store(PortfolioCreate $request) {
        $portfolio = $this->portfolio->create($request->all());
        $this->upload($portfolio);
        $portfolio->seo()->create(request('seo'));
        return redirect()->route('portfolio.create')->with('success', 'Successfully Created.');
    }

    public function show(Portfolio $portfolio) {
        $breadcrumb = breadcrumb([route('portfolio.index') => 'portfolios', 'show']);
        return view('admin.portfolio.show', compact('portfolio', 'breadcrumb'));
    }

    public function edit(Portfolio $portfolio) {
//        dd(sizeof($portfolio->picture));
        $breadcrumb = breadcrumb([route('portfolio.index') => 'portfolios', 'edit']);
        return view('admin.portfolio.form', compact('portfolio', 'breadcrumb'));
    }

    public function update(PortfolioUpdate $request, Portfolio $portfolio) {
        $portfolio->update($request->all());
        $this->upload($portfolio);
        $portfolio->seo()->update(request('seo'));
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function destroy(Portfolio $portfolio) {
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('success', 'Successfully Deleted.');
    }
    
}
