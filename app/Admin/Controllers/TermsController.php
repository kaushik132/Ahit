<?php



namespace App\Admin\Controllers;




use App\Terms;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TermsController extends AdminController{

     
    protected $title = 'Terms & Condition';
 

     protected function grid(){

        $grid = new Grid(new Terms());

        $grid->model()->orderBy('id', 'DESC');

        $grid->column('des', __('Short Description'));
       

      
         

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

        $show = new Show(Terms::findOrFail($id));



        $show->field('id', __('Id'));

       

        $show->field('des', __('Disclaimer'));

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

        $form = new Form(new Terms());

       
        $form->ckeditor('des', __('Disclaimer'));

        

        return $form;

    }

}

