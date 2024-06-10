<?php



namespace App\Admin\Controllers;



use App\ProjectCategory;
use App\ItProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ItProductController extends AdminController{

     
    protected $title = 'It Product';
 

     protected function grid(){

        $grid = new Grid(new ItProduct());

        $grid->model()->orderBy('id', 'DESC');

       

        $grid->column('productCategory.name', __('Category'));

        $grid->column('title', __('Title'));
        $grid->column('image', __('Image'))->image(url('/storage/'), 100, 150);

        // $grid->column('short_content', __('Short Description'));

        
        // $grid->column('slug', __('Slug'));
        

        // $grid->column('image', __('Image'))->image(url('/storage/'), 100, 150);

        // $grid->column('description', __('Seo Description'));

        // $grid->column('keywords', __('Seo Keywords'));

        // $grid->column('seo_title', __('Seo Title'));

        // $grid->column('status',__('Status'))->display(function ($status, $column) {

        //    If ($this->status == 1) {
        //          return "Publish";
        //        }
        //    return "Un Publish";

        // });

         

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

        $show = new Show(ItProduct::findOrFail($id));



        $show->field('id', __('Id'));

        $show->field('title', __('Title'));

        // $show->field('content', __('Content'));

        // $show->field('image', __('Image'));

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

        $form = new Form(new ItProduct());

       


        $form->tab('It Product ', function ($form) {
            $form->select('category_id',__('Category'))->options(ProjectCategory::pluck('name', 'id'))->default(null)->rules('required');

            $form->text('title', __('Title'));
            $form->text('pro_code', __('Product Code'));
            $form->text('pro_type', __('Prouct Type'));
            $form->text('duration', __('Duration'));
            $form->text('gst', __('GST'));
            $form->text('amt', __('Amount'));
            $form->text('discount', __('Discount'));
            $form->ckeditor('description', __('Description'));
            // $form->image('image', __('Image'))->removable();
            $form->text('pro_question', __('Question'));
            $form->text('pro_answer', __('Answer'));    
    
            
    
            $form->hidden('slug');
    
            $form->saving(function (Form $form) {
    
            $form->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->title))));
    
            });
         });
         $form->tab('Product Page', function ($form) {
            $form->text('page_1', __('Page No 1'));
            $form->text('page_2', __('Page No 2'));
            $form->text('page_3', __('Page No 3'));
            $form->text('page_4', __('Page No 4'));
            $form->text('page_5', __('Page No 5'));
            $form->text('page_6', __('Page No 6'));
            $form->text('page_7', __('Page No 7'));
            $form->text('page_8', __('Page No 8'));
            $form->text('page_9', __('Page No 9'));
            $form->text('page_10', __('Page No 10'));
           
           
         });
         $form->tab('Product Discount', function ($form) {
            $form->text('discount_1', __('Page des for page 1'));
            $form->text('discount_2', __('Page des for page 2'));
            $form->text('discount_3', __('Page des for page 3'));
            $form->text('discount_4', __('Page des for page 4'));
            $form->text('discount_5', __('Page des for page 5'));
            $form->text('discount_6', __('Page des for page 6'));
            $form->text('discount_7', __('Page des for page 7'));
            $form->text('discount_8', __('Page des for page 8'));
            $form->text('discount_9', __('Page des for page 9'));
            $form->text('discount_10', __('Page des for page 10'));
            
           
           
           
         });
         $form->tab('Page Name', function ($form) {
            $form->text('page_name', __('Page Name'));
          
           
           
         });
         $form->tab('Another Page Name', function ($form) {
            $form->text('another_page1', __('Type Any Project Name(page1)'));
            $form->text('another_page2', __('Type Any Project Name(page2)'));
            $form->text('another_page3', __('Type Any Project Name(page3)'));
            $form->text('another_page4', __('Type Any Project Name(page4)'));
            $form->text('another_page5', __('Type Any Project Name(page5)'));
            $form->text('another_page6', __('Type Any Project Name(page6)'));
            $form->text('another_page7', __('Type Any Project Name(page7)'));
            $form->text('another_page8', __('Type Any Project Name(page8)'));
            $form->text('another_page9', __('Type Any Project Name(page9)'));
            $form->text('another_page10', __('Type Any Project Name(page10)'));
   
          
            
           
           
           
         });
         $form->tab('Another Page Amount Set', function ($form) {
            $form->text('another_value1', __('Type Any value between 1 to 10 (page1)'));
            $form->text('another_value2', __('Type Any value between 1 to 10(page2)'));
            $form->text('another_value3', __('Type Any value between 1 to 10(page3)'));
            $form->text('another_value4', __('Type Any value between 1 to 10(page4)'));
            $form->text('another_value5', __('Type Any value between 1 to 10(page5)'));
            $form->text('another_value6', __('Type Any value between 1 to 10(page6)'));
            $form->text('another_value7', __('Type Any value between 1 to 10(page7)'));
            $form->text('another_value8', __('Type Any value between 1 to 10(page8)'));
            $form->text('another_value9', __('Type Any value between 1 to 10(page9)'));
            $form->text('another_value10', __('Type Any value between 1 to 10(page10)'));
           
   
          
            
           
           
           
         });


         $form->tab('Product Seo', function ($form) {
          
            $form->textarea('seo_description', __('Seo Description'));
    
            $form->textarea('seo_keyword', __('Seo Keywords'));
    
            $form->textarea('seo_title', __('Seo Title'));
         });


     

       

        return $form;

    }

}