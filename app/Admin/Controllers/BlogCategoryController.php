<?php



namespace App\Admin\Controllers;



use App\BlogCategory;

use Encore\Admin\Controllers\AdminController;

use Encore\Admin\Form;

use Encore\Admin\Grid;

use Encore\Admin\Show;

use Illuminate\Support\MessageBag;





class BlogCategoryController extends AdminController{

    /**

     * Title for current resource.

     *

     * @var string

     */

    protected $title = 'Blog Category List';



    /**

     * Make a grid builder.

     *

     * @return Grid

     */

    protected function grid(){

        $grid = new Grid(new BlogCategory());

        $grid->column('name', __('Name'));

        $grid->column('slug', __('Slug'));

        $grid->column('seo_description', __('Seo Description'));

		$grid->column('seo_keyword', __('Seo Keywords'));

		$grid->column('seo_title', __('Seo Title'));
       
        return $grid;

     }

    protected function detail($id){

         $show = new Show(BlogCategory::findOrFail($id));
        
         $show->field('name', __('Name'));
        
         return $show;
      }



  

    protected function form(){

        $form = new Form(new BlogCategory());

        $form->text('name', __('Name'));

        $form->hidden('slug');

        $form->saving(function (Form $form) {

           $form->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->name)));
        });

        $form->textarea('seo_description', __('Seo Description'));

        $form->textarea('seo_keyword', __('Seo Keywords'));

        $form->textarea('seo_title', __('Seo Title'));
       
        return $form;

    }

}

