<?php



namespace App\Admin\Controllers;



use App\ProjectCategory;

use Encore\Admin\Controllers\AdminController;

use Encore\Admin\Form;

use Encore\Admin\Grid;

use Encore\Admin\Show;

use Illuminate\Support\MessageBag;





class ProjectCategoryController extends AdminController{

    /**

     * Title for current resource.

     *

     * @var string

     */

    protected $title = 'Project Category List';



    /**

     * Make a grid builder.

     *

     * @return Grid

     */

    protected function grid(){

        $grid = new Grid(new ProjectCategory());

        $grid->column('name', __('Name'));

        $grid->column('slug', __('Slug'));

        $grid->column('seo_description', __('Seo Description'));

		$grid->column('seo_keyword', __('Seo Keywords'));

		$grid->column('seo_title', __('Seo Title'));
       
        return $grid;

     }

    protected function detail($id){

         $show = new Show(ProjectCategory::findOrFail($id));
        
         $show->field('name', __('Name'));
        
         return $show;
      }



  

    protected function form(){

        $form = new Form(new ProjectCategory());

        $form->text('name', __('Name'));

        $form->hidden('slug');

        $form->saving(function (Form $form) {

           $form->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->name)));
        });
        $form->image('image', __('Image'))->removable();

        $form->textarea('seo_description', __('Seo Description'));

        $form->textarea('seo_keyword', __('Seo Keywords'));

        $form->textarea('seo_title', __('Seo Title'));
       
        return $form;

    }

}

