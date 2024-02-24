<?php

namespace App\Http\Controllers\Api;

use App\DTO\GetResponseData;
use App\DTO\ResponseData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Interfaces\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    /**
     * ProductController constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function index(): ResponseData
    {
        $products = $this->productRepository->getAllProducts();

        return GetResponseData::getResponseData(
            $products,
            __('message.Data_retrieved_successfully'),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProductRequest $request
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function store(CreateProductRequest $request): ResponseData
    {
        $this->productRepository->createProduct($request->validated());

        // Return the response data indicating successful product creation
        return GetResponseData::getResponseData(
            null,
            __('message.Data_created_successfully'),
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function show(int $id): ResponseData
    {
        $product = $this->productRepository->getProductById($id);

        // Return the response data with the retrieved product
        return GetResponseData::getResponseData(
            $product,
            __('message.Data_retrieved_successfully'),
            200
        );
    }

    /**
     * Display the specified resource by slug.
     *
     * @param string $slug
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function showBySlug(string $slug): ResponseData
    {
        $product = $this->productRepository->getProductBySlug($slug);

        // Return the response data with the retrieved product
        return GetResponseData::getResponseData(
            $product,
            __('message.Data_retrieved_successfully'),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param int $id
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function update(UpdateProductRequest $request, int $id): ResponseData
    {
        $product = $this->productRepository->updateProduct($id, $request->validated());

        // Return the response data with the updated product
        return GetResponseData::getResponseData(
            $product,
            __('message.Data_updated_successfully'),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return ResponseData
     * @throws UnknownProperties
     */
    public function destroy(int $id): ResponseData
    {
        // Delete the product from the productRepository
        $this->productRepository->deleteProduct($id);

        // Return the response data indicating successful deletion
        return GetResponseData::getResponseData(
            null,
            __('message.Data_deleted_successfully'),
            200
        );
    }
}
