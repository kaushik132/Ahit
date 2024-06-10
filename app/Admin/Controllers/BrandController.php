<?php

namespace App\Admin\Controllers;

 
use App\Brand_list;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BrandController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Our clients';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
         $grid = new Grid(new Brand_list());
         $grid->column('name', __('Name'))->editable();
         $grid->column('logo', __('Brand logo'))->image(url('/storage/'), 100, 150);
         $grid->column('url', __('url'))->editable();
       
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
        $show = new Show(Brand_list::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        

        return $show;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        
        $form = new Form(new Brand_list());
        $form->text('name', __('Name'))->rules('required');
        $form->text('url', __('Url'))->rules('required');
        $form->image('logo', __('Brand logo'));
        return $form;
    }


}
