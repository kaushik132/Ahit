<?php

namespace App\Admin\Controllers;

use App\Faq;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class FaqHomeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string 
     */
    protected $title = 'Faq Home Page';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

  
        $grid = new Grid(new Faq());
        $grid->column('id', __('Id'));
        $grid->column('question', __('Question'));
        $grid->column('answer', __('Answer'));
        
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
        $show = new Show(Faq::findOrFail($id));
       
        $show->field('id', __('Id'));
        $show->field('question', __('Question'));
        $show->field('answer', __('Answer'));
        
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Faq());
        
        $form->textarea('question', __('Question'));
        $form->textarea('answer', __('Answer'));
        
          return $form;
    }
}
