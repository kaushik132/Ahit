<?php

namespace App\Admin\Controllers;

 
use App\Kaushik;
use Encore\Admin\Controllers\AdminController;
// use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuotationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Get Quotation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Kaushik());

        // $grid->column('id', __('Id'));
        $grid->column('fname', __('First Name'));
        $grid->column('lname', __('Last Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('code', __('Country'));
        $grid->column('mainservice', __('Main Service'));
        $grid->column('service', __('Sub Service'));
        $grid->column('duration', __('Start Duration'));
        $grid->column('duration', __('End Duration'));
        $grid->column('description', __('Description'));
       
      
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Kaushik::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('fname', __('First Name'));
        $show->field('lname', __('Last Name'));
        // $show->field('seo_keyword', __('Seo keyword'));
        // $show->field('seo_title', __('Seo title'));
        // $show->field('seo_description', __('Seo description'));
        // $show->field('slug', __('Slug'));
        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));

        return $show;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    // protected function form()
    // {
    //     $form = new Form(new Kaushik());

    //     $form->text('fname', __('First Name'));
    //     $form->text('lname', __('Last Name'));
    //     $form->text('email', __('Email'));
    //     $form->text('service', __('Service'));
    //     $form->text('duration', __('Duratiojj '));
    //     $form->text('description', __('Description'));


       

       



       


    //     return $form;
    // }


}
