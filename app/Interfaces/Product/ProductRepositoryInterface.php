<?php

namespace App\Interfaces\Product;

interface ProductRepositoryInterface
{
    /**
     * Get all products.
     *
     * @return mixed
     */
    public function getAllProducts(): mixed;

    /**
     * Get a product by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getProductById(int $id): mixed;

    /**
     * * Get a product by ID.
     *
     * @param string $slug
     * @return mixed
     */
    public function getProductBySlug(string $slug): mixed;

    /**
     * Create a new product.
     *
     * @param array $data
     * @return mixed
     */
    public function createProduct(array $data): mixed;

    /**
     * Update an existing product.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateProduct(int $id, array $data): mixed;

    /**
     * Delete a product.
     *
     * @param int $id
     * @return void
     */
    public function deleteProduct(int $id): void;
}