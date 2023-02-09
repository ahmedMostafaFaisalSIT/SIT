<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CompanyRepositoryInterface;

class CompanyController extends Controller
{
    protected $Companies;

    public function __construct(CompanyRepositoryInterface $Companies)
    {
        $this->Companies = $Companies;
    }


    public function index()
    {
        return $this->Posts->index();
    }


    public function create()
    {
        return $this->Posts->create();
    }


    public function store(StorePostRequest $request)
    {
        return $this->Posts->store($request);
    }


    public function show(Post $post)
    {
        //
    }


    public function edit($id)
    {
        return $this->Posts->edit($id);
    }


    public function update(StorePostRequest $request, $id)
    {

        return $this->Posts->update($request,$id);

    }


    public function destroy($id)
    {
        return $this->Posts->destroy($id);
    }
}
