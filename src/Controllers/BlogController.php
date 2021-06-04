<?php

namespace SimaoCoutinho\Blog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use SimaoCoutinho\Blog\Models\Blog;
use SimaoCoutinho\Blog\Models\BlogCategory;
use SimaoCoutinho\Blog\Models\BlogCategoryRelationship;

class BlogController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::where('deleted', 0)->get();

        return view('backend.news', [
            "blogs" => $blogs
        ]);
    }

    public function blogAdd()
    {
        return view('backend.newsShow', [
            "blogCategories" => BlogCategory::where("deleted", 0)->where("state", 1)->orderBy("title")->get()
        ]);
    }

    public function blogShow($id)
    {
        return view('backend.newsShow', [
            "blogCategories" => BlogCategory::where("deleted", 0)->where("state", 1)->orderBy("title")->get(),
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

            $blog->image = '/public/uploads/blog/img/' . $input['imagename'];
        }

        $video = $request->file('video');
        if (empty($video) == FALSE) {
            $fileExtension = strtolower($video->getClientOriginalExtension());
            $fileName = Str::slug($request->title, "-") . '-' . time() . '.' . $fileExtension;
            $urlVideo = '/public/uploads/blog/video/' . $fileName;

            if (!file_exists(public_path() . '/uploads/blog/video/'))
                mkdir(public_path() . '/uploads/blog/video/', 0777, true);

            $video->move(public_path() . '/uploads/blog/video/', $fileName);

            $blog->video = $urlVideo;
        }

        $url_alias = Str::slug($request->title, "-");

        $blog->title = $request->title;
        $blog->url_alias = $url_alias;
        $blog->text = $request->text;
        $blog->date = $request->post_date;
        $blog->summary = $request->summary;
        $blog->featured = isset($request->featured) ? 1 : 0;
        $blog->state = isset($request->state) ? 1 : 0;
        $blog->save();

        if (Blog::where('id', '!=', $blog->id)->where('url_alias', $url_alias)->exists()) {
            $url_alias .= '-' . $blog->id;

            Blog::where('id', $blog->id)->update(['url_alias' => $url_alias]);
        }

        if (isset($request->categories)) {
            BlogCategoryRelationship::where("blog_id", $blog->id)
                ->whereNotIn("category_id", $request->categories)
                ->delete();

            foreach ($request->categories as $category) {
                $count = BlogCategoryRelationship::where("blog_id", $blog->id)
                    ->where("category_id", $category)
                    ->count();

                if ($count == 0) {
                    $blogCategory = new BlogCategoryRelationship();
                    $blogCategory->blog_id = $blog->id;
                    $blogCategory->category_id = $category;
                    $blogCategory->save();
                }
            }
        }

        return response()->redirectToRoute("news");
    }

    public function blogDelete(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->deleted = 1;
        $blog->save();

        return response()->json(["status" => TRUE]);
    }

    public function blogCategories()
    {
        $blogCategory = BlogCategory::where("deleted", 0)
            ->get();

        return view("blog::blogCategories", [
            "title" => "Category News",
            "categories" => $blogCategory,
            "route" => "categoryNewsShow"
        ]);
    }

    public function blogCategoryAdd()
    {
        return view("backend.categoryShow", [
            "title" => "Category News",
            "route" => "admin/categoryNews/"
        ]);
    }

    public function blogCategoryShow($id)
    {
        return view("backend.categoryShow", [
            "title" => "CategoryNews",
            "route" => "admin/categoryNews/",
            "buttonDelete" => TRUE,
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

        $categoryNews->title = $request->title;
        $categoryNews->url_alias = Str::slug($request->title, "-");
        $categoryNews->save();

        return response()->json(["status" => TRUE]);
    }

    public function blogCategoryDelete(Request $request)
    {
        $cetegoryNews = BlogCategory::findOrFail($request->id);
        $cetegoryNews->deleted = 1;
        $cetegoryNews->update();

        return response()->json(["status" => TRUE]);
    }
}
