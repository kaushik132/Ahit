<?php

namespace App\Admin\Controllers;

use App\ExpertList;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExpertListController extends AdminController{

     
    protected $title = 'It Services';
 

     protected function grid(){

            $grid = new Grid(new ExpertList());
            $grid->model()->orderBy('id', 'DESC');
            $grid->column('name', __('Name'));
            $grid->column('department', __('Department'));
            $grid->column('profile_pic', __('Profile Pic'))->image(url('/storage/'), 100, 150); 
            return $grid;
    }

 
    protected function detail($id)

    {

        $show = new Show(ExpertList::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        return $show;

    }



    /**

     * Make a form builder.

     *

     * @return Form

     */

    protected function form(){

        $form = new Form(new ExpertList());
         $form->text('name', __('Name'));
        $form->text('department', __('Department'));
        $form->image('profile_pic', __('Profile'));
        return $form;

    }

}

