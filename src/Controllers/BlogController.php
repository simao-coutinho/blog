<?php

namespace SimaoCoutinho\Blog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use SimaoCoutinho\Blog\Models\Blog;
use SimaoCoutinho\Blog\Models\BlogCategory;
use SimaoCoutinho\Blog\Models\BlogCategoryDescription;
use SimaoCoutinho\Blog\Models\BlogCategoryRelationship;
use SimaoCoutinho\Blog\Models\BlogDescription;

class BlogController extends Controller
{
    //region Blogs
    public function blogs()
    {
        $blogs = Blog::where('deleted', 0)->get();

        return view('blog::blogs', [
            "blogs" => $blogs
        ]);
    }

    public function blogAdd()
    {
        return view('blog::blogShow', [
            "blogCategories" => BlogCategory::where("deleted", 0)->where("state", 1)->get()
        ]);
    }

    public function blogShow($id)
    {
        return view('blog::blogShow', [
            "blogCategories" => BlogCategory::where("deleted", 0)->where("state", 1)->get(),
            "blog" => Blog::findOrFail($id)
        ]);
    }

    public function blogUpdate(Request $request)
    {
        if ($request->id != 0) {
            $blog = Blog::findOrFail($request->id);
        } else {
            $blog = new Blog();
        }

        $image = $request->file('img');
        if (empty($image) == FALSE) {
            $input['imagename'] = Str::slug($request->title, "-") . '_' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/blog/img');
            $img = Image::make($image->getRealPath());
            $img->resize(700, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            $blog->image = '/uploads/blog/img/' . $input['imagename'];
        }

        $video = $request->file('video');
        if (empty($video) == FALSE) {
            $fileExtension = strtolower($video->getClientOriginalExtension());
            $fileName = Str::slug($request->title, "-") . '-' . time() . '.' . $fileExtension;
            $urlVideo = '/uploads/blog/video/' . $fileName;

            if (!file_exists(public_path() . '/uploads/blog/video/'))
                mkdir(public_path() . '/uploads/blog/video/', 0777, true);

            $video->move(public_path() . '/uploads/blog/video/', $fileName);

            $blog->video = $urlVideo;
        }

        $blog->date = $request->post_date;
        $blog->featured = isset($request->featured) ? 1 : 0;
        $blog->state = isset($request->state) ? 1 : 0;
        $blog->save();

        $blogDescription = BlogDescription::whereLanguageId(0)->whereBlogId($blog->id)->firstOrNew();
        $url_alias = Str::slug($request->title, "-");
        $blogDescription->language_id = 0;
        $blogDescription->blog_id = $blog->id;
        $blogDescription->title = $request->title;
        $blogDescription->url_alias = $url_alias;
        $blogDescription->text = $request->text;
        $blogDescription->summary = $request->summary;
        $blogDescription->save();

        if (BlogDescription::where('id', '!=', $blogDescription->id)->where('url_alias', $url_alias)->exists()) {
            $url_alias .= '-' . $blogDescription->id;

            BlogDescription::where('id', $blogDescription->id)->update(['url_alias' => $url_alias]);
        }

        if (isset($request->categories)) {
            BlogCategoryRelationship::where("blog_id", $blog->id)
                ->whereNotIn("blog_category_id", $request->categories)
                ->delete();

            foreach ($request->categories as $category) {
                $count = BlogCategoryRelationship::where("blog_id", $blog->id)
                    ->where("blog_category_id", $category)
                    ->count();

                if ($count == 0) {
                    $blogCategory = new BlogCategoryRelationship();
                    $blogCategory->blog_id = $blog->id;
                    $blogCategory->blog_category_id = $category;
                    $blogCategory->save();
                }
            }
        }

        return redirect()->route('admin.blogs');
    }

    public function blogDelete(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->deleted = 1;
        $blog->save();

        return response()->json(["status" => TRUE]);
    }
    //endregion

    //region Blog Category
    public function blogCategories()
    {
        $blogCategory = BlogCategory::where("deleted", 0)
            ->get();

        return view("blog::blogCategories", [
            "categories" => $blogCategory
        ]);
    }

    public function blogCategoryAdd()
    {
        return view("blog::blogCategoryShow");
    }

    public function blogCategoryShow($id)
    {
        return view("blog::blogCategoryShow", [
            "category" => BlogCategory::findOrFail($id),
        ]);
    }

    public function blogCategoryUpdate(Request $request)
    {
        if ($request->id == 0) {
            $categoryNews = new BlogCategory();
            $categoryNews->state = 1;
        } else {
            $categoryNews = BlogCategory::findOrFail($request->id);
            $categoryNews->state = isset($request->checkState) ? 1 : 0;
        }
        $categoryNews->save();

        $categoryDescription = BlogCategoryDescription::whereBlogCategoryId($categoryNews->id)->whereLanguageId(0)->firstOrNew();
        $categoryDescription->blog_category_id = $categoryNews->id;
        $categoryDescription->title = $request->input('title');
        $categoryDescription->description = $request->description;
        $categoryDescription->url_alias = $request->url_alias;
        $categoryDescription->save();

        return response()->json(["status" => TRUE]);
    }

    public function blogCategoryDelete(Request $request)
    {
        $cetegoryNews = BlogCategory::findOrFail($request->id);
        $cetegoryNews->deleted = 1;
        $cetegoryNews->update();

        return response()->json(["status" => TRUE]);
    }
    //endregion
}
