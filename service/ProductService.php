<?php

namespace service;

use models\Product;

class ProductService {

    public function getListView(int $page)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = $limit * ($page - 1);

        return Product::offset($offset)
            ->limit($limit)
            ->get();
    }

    public function getProductCount()
    {
        return Product::all()->count() + 1;
    }
}