<?php



namespace App\Admin\Controllers;

use App\ItServices;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItServiceController extends AdminController{

     
    protected $title = 'It Services';
 

     protected function grid(){

            $grid = new Grid(new ItServices());
            $grid->model()->orderBy('id', 'DESC');
            $grid->column('name', __('Name'));
            $grid->column('title', __('Title'));
            // $grid->column('short_description', __('Short Description'));
            $grid->column('home_image', __('Image (1)'))->image(url('/storage/'), 100, 150);
            $grid->column('page_image', __('Image (2)'))->image(url('/storage/'), 100, 150);
            // $grid->column('seo_description', __('Seo Description'));
            // $grid->column('seo_keyword', __('Seo Keywords'));
            // $grid->column('seo_title', __('Seo Title'));
            $grid->column('icon_degine')->radio([
                1 => 'Type-1',
                2 => 'Type-2',
                3 => 'Type-3',
            ]);
            return $grid;
    }

 
    protected function detail($id)

    {

        $show = new Show(ItServices::findOrFail($id));



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

        $form = new Form(new ItServices());
        $form->tab('It Service Details', function ($form) {
        $form->radio("icon_degine","icon design")->options(['1' => 'Type-1','2' => 'Type-2','3' => 'Type-3'])->default('1')->stacked();
        $form->text('name', __('Name'));
        $form->text('title', __('Title'));
        $form->textarea('short_description', __('Short Description'));
        $form->image('home_image', __('Home Image'));
        $form->image('page_image', __('Page Image'));
        $form->ckeditor('full_description', __('Full Description'));
        // $form->text('alt', __('Alt'));
        $form->hidden('slug');
        $form->saving(function (Form $form) {
        $form->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->name))));
        });
        $form->textarea('seo_description', __('Seo Description'));
        $form->textarea('seo_keyword', __('Seo Keywords'));
        $form->textarea('seo_title', __('Seo Title'));

        $form->image('home_banner1', __('Banner 1'));
        $form->image('home_banner2', __('Banner 2'));
        $form->image('home_banner3', __('Banner 3'));
    });

    $form->tab('It Service FAQ', function ($form) {
          
        $form->textarea('qua1', __('Question 1'));
        $form->textarea('ans1', __('Answer 1'));

        $form->textarea('qua2', __('Question 2'));
        $form->textarea('ans2', __('Answer2'));

        $form->textarea('qua3', __('Question 3'));
        $form->textarea('ans3', __('Answer 3'));

        $form->textarea('qua4', __('Question 4'));
        $form->textarea('ans4', __('Answer 4'));
    

       
     });



        return $form;

    }

}

