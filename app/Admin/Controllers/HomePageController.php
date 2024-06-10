<?php

namespace App\Admin\Controllers;

use App\HomePage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class HomePageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string 
     */
    protected $title = 'HomePage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        return redirect('/admin/home-page/1/edit');
        $grid = new Grid(new HomePage());
        // $grid->disableTools();
        $grid->disableFilter();
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->disableBatchActions();
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            // $actions->disableEdit();
            // $actions->disableView();
        });
        $grid->column('id', __('Id'));
        
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
        $show = new Show(HomePage::findOrFail($id));
        $show->panel()->tools(function ($tools) {
            $tools->disableDelete();
            // $tools->disableList();

        });
        $show->field('id', __('Id'));
        $show->field('baner1', __('Baner1'));
        $show->field('baner2', __('Baner2'));
        $show->field('baner3', __('Baner3'));
        $show->field('baner1_heading', __('Baner1 heading'));
        $show->field('baner2_heading', __('Baner2 heading'));
        $show->field('baner3_heading', __('Baner3 heading'));
        $show->field('baner1_text', __('Baner1 text'));
        $show->field('baner2_text', __('Baner2 text'));
        $show->field('baner3_text', __('Baner3 text'));
        $show->field('featured_area_heading', __('Content area heading'));
        $show->field('featured_area_text', __('Content area text'));
        $show->field('fh1_heading', __('Fh1 heading'));
        $show->field('fh1_text', __('Fh1 text'));
        $show->field('fh2_heading', __('Fh2 heading'));
        $show->field('fh2_text', __('Fh2 text'));
        $show->field('fh3_heading', __('Fh3 heading'));
        $show->field('fh3_text', __('Fh3 text'));
        $show->field('app_image', __('App Image'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new HomePage());
        

         $form->tools(function (Form\Tools $tools) {
                $tools->disableList();
                $tools->disableDelete();
                $tools->disableView();
          });

           $form->footer(function ($footer) {
             
                $footer->disableReset();
                $footer->disableViewCheck();
                $footer->disableEditingCheck();
                $footer->disableCreatingCheck();

             });

           $form->tab('Home Page Top Bar', function ($form) {
             $form->textarea('home_page_title', __('Home Page Title'));
             $form->textarea('home_page_description', __('Home Page Description'));
           });



           $form->tab('Home-Contact-About SEO Tags', function ($form) {

             $form->textarea('seo_title_home', __('Home page seo title'));
             $form->textarea('seo_des_home', __('Home page seo description'));

             $form->textarea('seo_title_contact', __('Contact-us page seo title'));
             $form->textarea('seo_des_contect', __('Contact-us page seo description'));
             
             $form->textarea('seo_title_about', __('About-us page seo title'));
             $form->textarea('seo_des_about', __('About-us page seo description'));

             $form->textarea('seo_title_blog', __('Blog Seo title'));
             $form->textarea('seo_des_blog', __(' Blog Seo description'));


             $form->textarea('seo_title_project', __('Project Seo title'));
             $form->textarea('seo_des_project', __(' Project Seo description'));

           });

          
            $form->submitted(function (Form $form) {

             $success = new MessageBag([
            
             'title'   => 'Update',
             'message' => 'Data Update successfully !!',
            
            ]);
          }); 
          return $form;
    }
}
