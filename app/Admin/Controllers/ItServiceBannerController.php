<?php

namespace App\Admin\Controllers;

 
use App\ItServiceBanner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItServiceBannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'It Service Banner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ItServiceBanner());
        $grid->column('url', __('Url'))->editable();
      
         
         $grid->column('image', __('Image'))->image(url('/storage/'), 100, 150);
         $grid->column('alt', __('Alt Tag'))->editable();
         
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
        $show = new Show(ItServiceBanner::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('url', __('URL'));
      
        $show->image()->image();
        $show->field('alt', __('Alt Tag'));
       
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
        

        $form = new Form(new ItServiceBanner());
        
        $form->text('url', __('URL')); 
        
        $form->image('image', __('Image'))
        ->move('it-services-banner')
        ->uniqueName()->removable();
        $form->text('alt', __('Alt tag'));
        return $form;
    }


}
