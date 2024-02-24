<?php

namespace App\Repositories\Product;

use App\Helper\ImageHelper;
use App\Helper\SlugHelper;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Get all products.
     *
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return Product::where('is_active', true)->get();
    }

    /**
     * Get a product by ID.
     *
     * @param int $id
     * @return Product|null
     */
    public function getProductById(int $id): ?Product
    {
        return Product::where('is_active', true)->findOrFail($id);
    }

    /**
     * Get a product by slug.
     *
     * @param string $slug
     * @return Product|null
     */
    public function getProductBySlug(string $slug): ?Product
    {
        return Product::where('slug', $slug)->firstOrFail();
    }

    /**
     * Create a new product.
     *
     * @param array $data
     * @return Product
     */
    public function createProduct(array $data): Product
    {
        $imagePath = null;

        if (isset($data['image'])) {
            $imagePath = ImageHelper::saveImage($data['image'], 'product_image');
        }

        $data['image'] = $imagePath;
        // Generate a slug from the provided 'name' value
        $data['slug'] = SlugHelper::generateUniqueSlug($data['name'], new Product());

        return Product::create($data);
    }

    /**
     * Update a product by ID with the given data.
     *
     * @param int $id
     * @param array $data
     * @return Product
     */
    public function updateProduct(int $id, array $data): Product
    {
        $product = Product::find($id);
        $imagePath = null;

        if (isset($data['image'])) {
            $imagePath = ImageHelper::saveImage($data['image'], 'product_image');
        }
        $data['image'] = $imagePath;

        if (isset($data['name'])) {
            // Generate a slug from the provided 'name' value
            $data['slug'] = SlugHelper::generateUniqueSlug($data['name'], new Product());
        }

        $product->update($data);

        return $product;
    }

    /**
     * Delete a product by ID.
     *
     * @param int $id
     * @return void
     */
    public function deleteProduct(int $id): void
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}