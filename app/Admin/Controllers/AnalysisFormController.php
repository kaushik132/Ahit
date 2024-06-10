<?php

namespace App\Admin\Controllers;

 
use App\Analysis;
use Encore\Admin\Controllers\AdminController;
// use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnalysisFormController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Get Free SEO Analysis';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Analysis());

        // $grid->column('id', __('Id'));
        $grid->column('username', __('Name'));
        $grid->column('website', __('Website'));
        $grid->column('email', __('Email'));
        $grid->column('message', __('Message'));
        
       
      
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
        $show = new Show(Analysis::findOrFail($id));

        // $show->field('id', __('Id'));
        $show->field('username', __('Name'));
        $show->field('website', __('Website'));
        $show->field('email', __('Email'));
        $show->field('message', __('Message'));
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
