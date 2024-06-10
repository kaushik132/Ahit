<?php

namespace App\Admin\Controllers;

 
use App\Testimonial;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestimonialController extends AdminController
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
        $grid = new Grid(new Testimonial());
        $grid->column('name', __('Name'))->editable();
        $grid->column('designation', __('Designation'))->editable();
        $states = [
                'on'  => ['value' => 1, 'text' => 'Enable', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'Disable', 'color' => 'danger'],
           ];
         
         $grid->column('image', __('Image'))->image(url('/storage/'), 100, 150);
         $grid->column('alt_tag', __('Alt Tag'))->editable();
         $grid->column('status', __('Status'))->switch($states);
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
        $show = new Show(Testimonial::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('designation', __('Designation'));
        // $show->field('department', __('Department'));
        $show->field('about', __('Description'));
        $show->image()->image();
        $show->field('alt_tag', __('Alt Tag'));
        $show->status()->using(['0' => 'Disable', '1' => 'Enable']);
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
         $states = [
                'off' => ['value' => 0, 'text' => 'Disable', 'color' => 'danger'],
                'on'  => ['value' => 1, 'text' => 'Enable', 'color' => 'success'],
            ];


        $form = new Form(new Testimonial());
        $form->text('name', __('Name'))->rules('required');
        $form->text('designation', __('Designation'))->rules('required');
        $form->switch('status', __('Status'))->states($states);
        $form->textarea('about', __('Description'));
        $form->image('image', __('Image'))
              ->move('our_clients')
              ->uniqueName()->removable();
        $form->text('alt_tag', __('Alt tag'))->rules('required');
        return $form;
    }


}
