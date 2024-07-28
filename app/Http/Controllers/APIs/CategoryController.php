<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryDetailsRequest;
use App\Http\Requests\StoreCategorySEORequest;
use App\Http\Requests\UpdateCategoryDetailsRequest;
use App\Http\Requests\UpdateCategorySEORequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    // Show Categories page english & arabic
    public function index(Request $request)
    {
        try {
            $lang = $request->input('lang');
            $query = Category::query();

            if ($lang) {
                $query->where('lang', $lang);
            }

            $categories = $query->select('id', 'title', 'slug', 'h1')->get();

            // Add image URLs to each category
            $categories->transform(function ($category) {
                $category->image = $category->getFirstMediaUrl('images');
                unset($category->media);
                return $category;
            });

            return response()->json($categories, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve categories', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(StoreCategoryDetailsRequest $request)
    {
        try {
            $validatedData = $request->validated();

            // Create the category
            $category = Category::create($validatedData);

            // Handle image upload and association
            if ($request->hasFile('image')) {
                $category->addMediaFromRequest('image')->toMediaCollection('images');
            }
            // Handle multi images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $category->addMedia($image)->toMediaCollection('multi_images');
                }
            }

            return response()->json($category, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create category', 'message' => $e->getMessage()], 500);
        }
    }

    // get multi images for a category
    public function getMultiImages($slug)
    {
        try {
            $category = Category::where('slug', $slug)->firstOrFail();

            // Retrieve all media items in the 'multi_images' collection
            $mediaItems = $category->getMedia('multi_images');

            // Transform media items to include IDs and URLs
            $images = $mediaItems->map(function ($mediaItem) {
                return [
                    'id' => $mediaItem->id,
                    'url' => $mediaItem->getUrl(),
                ];
            });

            return response()->json($images, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve images', 'message' => $e->getMessage()], 500);
        }
    }

    public function deleteMultiImage($slug, $mediaId)
    {
        try {
            $category = Category::where('slug', $slug)->firstOrFail();

            // Find the specific media item by its ID
            $mediaItem = $category->getMedia('multi_images')->where('id', $mediaId)->first();

            if ($mediaItem) {
                $mediaItem->delete();
                return response()->json(['message' => 'Image deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Image not found'], 404);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete image', 'message' => $e->getMessage()], 500);
        }
    }

    public function show($slug)
    {
        try {
            // Find the category by slug
            $category = Category::where('slug', $slug)->firstOrFail();

            // Load the media associated with the category
            $image = $category->getFirstMediaUrl('images');

            // Add the image URL to the category attributes
            $categoryData = $category->toArray();
            $categoryData['image'] = $image;

            return response()->json($categoryData, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to retrieve category', 'message' => $e->getMessage()], 500);
        }
    }

    // Update category details
    public function update(UpdateCategoryDetailsRequest $request, $slug)
    {
        try {
            $validatedData = $request->validated();

            // Find the category by slug
            $category = Category::where('slug', $slug)->firstOrFail();

            $category->update($validatedData);

            // Handle image upload and association
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $category
                    ->clearMediaCollection('images')
                    ->addMedia($image)
                    ->toMediaCollection('images');
            }

            // Handle multi images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $category
                        ->clearMediaCollection('multi_images')
                        ->addMedia($image)
                        ->toMediaCollection('multi_images');
                    }
            }

            return response()->json($category, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update category', 'message' => $e->getMessage()], 500);
        }
    }

    // Update category SEO
    public function updateSEO(UpdateCategorySEORequest $request, $slug)
    {
        try {
            $validatedData = $request->validated();

            // Find the category by slug
            $category = Category::where('slug', $slug)->firstOrFail();

            $category->update($validatedData);
            return response()->json($category, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update category SEO', 'message' => $e->getMessage()], 500);
        }
    }

    // Bulk hide categories
    public function bulkHide(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:categories,id'
        ]);

        // Get the array of IDs from the request
        $ids = $request->input('ids');

        // Perform the bulk update and get the number of affected rows
        $affectedRows = Category::whereIn('id', $ids)->update(['hidden' => true]);

        if ($affectedRows === 0) {
            return response()->json(['error' => 'No categories were updated.'], 404);
        }

        return response()->json(['message' => "$affectedRows categories hidden successfully."], 200);
    }

    // Unhide after being hidden
    public function unhide($id)
    {
        try {
            $category = Category::findOrFail($id);

            if ($category->hidden) {
                $category->hidden = false;
                $category->save();
                return response()->json(['message' => 'Record unhidden successfully'], 200);
            } else {
                return response()->json(['error' => 'Record is not hidden'], 400);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to unhide record', 'message' => $e->getMessage()], 500);
        }
    }


}
