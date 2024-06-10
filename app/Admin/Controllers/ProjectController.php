<?php



namespace App\Admin\Controllers;



use App\ProjectCategory;
use App\Project;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProjectController extends AdminController{

     
    protected $title = 'Project';
 

     protected function grid(){

        $grid = new Grid(new Project());

        $grid->model()->orderBy('id', 'DESC');

       

        $grid->column('projectCategory.name', __('Category'));

        $grid->column('title', __('Title'));

        $grid->column('short_content', __('Short Description'));

        
        // $grid->column('slug', __('Slug'));
        

        $grid->column('image', __('Image'))->image(url('/storage/'), 100, 150);

        // $grid->column('description', __('Seo Description'));

        // $grid->column('keywords', __('Seo Keywords'));

        // $grid->column('seo_title', __('Seo Title'));

        // $grid->column('status',__('Status'))->display(function ($status, $column) {

        //    If ($this->status == 1) {
        //          return "Publish";
        //        }
        //    return "Un Publish";

        // });

         

       return $grid;

    }



    /**

     * Make a show builder.

     *

     * @param mixed $id

     * @return Show

     */

    protected function detail($id)

    {

        $show = new Show(Project::findOrFail($id));



        $show->field('id', __('Id'));

        $show->field('title', __('Title'));

        $show->field('content', __('Content'));

        $show->field('image', __('Image'));

        $show->field('created_at', __('Created at'));

        $show->field('updated_at', __('Updated at'));



        return $show;

    }



    /**

     * Make a form builder.

     *

     * @return Form

     */

    protected function form(){

        $form = new Form(new Project());

       


        $form->tab('Project Detail', function ($form) {
            $form->select('category_id',__('Category'))->options(ProjectCategory::pluck('name', 'id'))->default(null)->rules('required');

            $form->text('title', __('Title'));
    
            $form->textarea('short_content', __('Short Description'));
            
    
            $form->ckeditor('content', __('Content'));
    
            $form->image('image', __('Image'))->removable();
            $form->text('alt', __('Alt'));
    
            // $form->radio('redirect_type', __('Redirect Type'))->options(['1' => 'self', '2'=> '301', '3'=> '302'])->default('1');
            //  $form->text('url', __('Url'));
    
            $form->hidden('slug');
    
            $form->saving(function (Form $form) {
    
            $form->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->title))));
    
            });
         });

     

         $form->tab('Project Seo & Question view', function ($form) {
            $form->textarea('questions', __('FAQs questions'));
            $form->textarea('answers', __('FAQs answers'));
            $form->textarea('description', __('Seo Description'));
    
            $form->textarea('keywords', __('Seo Keywords'));
    
            $form->textarea('seo_title', __('Seo Title'));
         });

         $form->tab('Project Social Detail', function ($form) {
            $form->image('f_image', __('Social(1) Image'))->removable();
            $form->text('f_alt', __('Social(1) Alt'));
            $form->url('f_link', __('Social(1) Link'));
            
            
         
            $form->image('i_image', __('Social(2) Image'))->removable();
            $form->text('i_alt', __('Social(2) Alt'));
            $form->url('i_link', __('Social(2) Link'));

            $form->image('p_image', __('Social(3) Image'))->removable();
            $form->text('p_alt', __('Social(3) Alt'));
            $form->url('p_link', __('Social(3) Link'));

            $form->image('w_image', __('Social(4) Image'))->removable();
            $form->text('w_alt', __('Social(4) Alt'));
            $form->url('w_link', __('Social(4) Link'));

            $form->text('totel_mem', __('Totel Member'));
            $form->ckeditor('open_time', __('Opning Timing'));
            
         });

       

        return $form;

    }

}

