<?php

namespace App\Admin\Controllers;

 
use App\HomeBanner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HomeBannerController extends AdminController
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
        $grid = new Grid(new HomeBanner());
       
         
         $grid->column('image', __('Image'))->image(url('/storage/'), 100, 150);
         $grid->column('alt', __('Alt'));
         $grid->column('url', __('URL'));
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
        $show = new Show(HomeBanner::findOrFail($id));
        $show->field('id', __('Id'));
      
        $show->image()->image();
        $show->field('alt', __('Alt Tag'));
        $show->field('url', __('URL'));
        
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
        


        $form = new Form(new HomeBanner());
       
       
        $form->image('image', __('Image'));
          
        $form->text('alt', __('Alt tag'))->rules('required');
        $form->text('url', __('URL'));
    
        return $form;
    }


}
