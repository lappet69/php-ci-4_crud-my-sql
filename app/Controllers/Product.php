<?php

namespace App\Controllers;

class Product extends BaseController
{
    protected $tb_products;
    protected $validation;
    protected $callApi;

    public function __construct()
    {
        $tb_products = new \App\Models\Product();
        $callApi = new \App\Controllers\ApiController();
        $validation = \Config\Services::validation();

        // ambil data api
        $callApi->getAPI();
        $this->tb_products = $tb_products;
        $this->validation = $validation;
    }

    public function index()
    {

        $pager = service('pager');

        $page    = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 10;
        $offset = ($page - 1) * $perPage + 1;

        $products = $this->tb_products->where('status', 'bisa dijual')->findAll($perPage, $offset);
        $total = count($this->tb_products->where('status', 'bisa dijual')->findAll());
        $pager_links = $pager->makeLinks($page, $perPage, $total, 'product_pagination');
        $data = [
            'title' => 'Product',
            'products' => $products,
            'pager_links' => $pager_links,
            'offset' => $offset,
            'current_page' => $pager->getPerPage(),
        ];

        return view('product/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Product',
            'validation' => \Config\Services::validation()
        ];
        return view('product/create', $data);
    }


    public function store()
    {

        if (!$this->validate($this->tb_products->validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        } else {
            $this->tb_products->save($this->request->getVar());
            session()->setFlashdata('success', 'Product baru ditambahkan');
            return redirect('/');
        }
    }


    public function edit($id)
    {

        $product = $this->tb_products->where('id_produk', $id)->first();
        $data = [
            'title' => 'Edit Product',
            'product' => $product
        ];
        return view('product/edit', $data);
    }


    public function update($id)
    {

        if (!$this->validate($this->tb_products->validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        } else {
            $this->tb_products->update($id, $this->request->getVar());
            session()->setFlashdata('success', 'Product berhasil diupdate');
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $this->tb_products->delete($id);
        session()->setFlashdata('success', 'Product berhasil dihapus');
        return redirect('/');
    }
}
