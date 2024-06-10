<?php

namespace App\Admin\Controllers;

 
use App\Enquiry;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EnquiryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Enquiry';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Enquiry());
       
         
         $grid->column('name', __('Name'));
         $grid->column('email', __('Email'));
         $grid->column('phone', __('Phone'));
         $grid->column('message', __('Message'));
       
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
        $show = new Show(Enquiry::findOrFail($id));
        $show->field('id', __('Id'));
      
      
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('message', __('Message'));
       
        
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        


        $form = new Form(new Enquiry());
       
       
     
          
        $form->text('name', __('Name'));
        $form->text('email', __('Email'));
        $form->text('phone', __('Phone'));
        $form->textarea('message','Message')->rows(10);
      
    
        return $form;
    }


}
