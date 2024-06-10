<?php



namespace App\Admin\Controllers;

use App\ItServices;
use App\ItSubServices;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItSubServiceController extends AdminController{

     
    protected $title = 'It Sub Services';
 

     protected function grid(){

            $grid = new Grid(new ItSubServices());
            $grid->model()->orderBy('id', 'DESC');
             $grid->column('servicename.name', __('Service'));
             $grid->column('title', __('Title'));
             $grid->column('short_description', __('Short Description'));
  
             $grid->column('icon', __('Icon Image'))->image(url('/storage/'), 100, 150);
            return $grid;
    }

 
    protected function detail($id)

    {

        $show = new Show(ItSubServices::findOrFail($id));



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

        $form = new Form(new ItSubServices());

        $form->select('it_services_id',__('Service'))->options(ItServices::pluck('name', 'id'))->default(null)->rules('required');
        $form->select('it_services_name',__('Service Name'))->options(ItServices::pluck('name', 'name'))->default(null)->rules('required');
        // $form->hidden('it_services_name');
        // $form->saving(function (Form $form) {
        //     $form->it_services_name = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->it_services_id))));
        //     });



        $form->text('title', __('Title'));
        $form->textarea('short_description', __('Short Description'));
        $form->image('icon', __('Icon Image'));
        $form->hidden('slug');
        $form->saving(function (Form $form) {
        $form->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->title))));
        });
        $form->textarea('seo_description', __('Seo Description'));
        $form->textarea('seo_keyword', __('Seo Keywords'));
        $form->textarea('seo_title', __('Seo Title'));
        return $form;

    }

}

