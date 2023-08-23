<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CategoryPage extends SearchableComponent
{
    public $slug;
    public $subName;
    public $paginationTheme = 'bootstrap';
    
    /**
     * @var mixed
     */
    private $subCategory;

    public function mount($slug = Null, $subName = Null)
    {
        $this->slug = $slug;
        $this->subName = $subName;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $categoryPosts = $this->postsData();
        
        return view('livewire.category-page', compact('categoryPosts'));
    }

    /**
     * @return LengthAwarePaginator
     */
    public function postsData()
    {
        $this->setQuery($this->getQuery()->with([ 'category', 'postArticle', 'postGalleries', 'postSortLists.media', 'postSortLists', 'media', 'user'])->where('visibility',Post::VISIBILITY_ACTIVE));

        $categoryId = (!empty(Category::where('slug', $this->slug)->first())) ? Category::where('slug', $this->slug)
            ->first()->id : null;
        $this->getQuery()->where('category_id', $categoryId);

        if (!empty($this->subName)) {
            $sub = SubCategory::where('slug', $this->subName)->first();
            $subId = (!empty($sub)) ? $sub->id : null;
            $this->getQuery()->where('sub_category_id' ,$subId);
        }

        return $this->paginate();
    }
    
    function model()
    {
        return Post::class;
    }

    function searchableFields()
    {
        return ['category_id'];
    }
}
