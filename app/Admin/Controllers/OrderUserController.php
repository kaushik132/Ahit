<?php



namespace App\Admin\Controllers;




use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

class OrderUserController extends AdminController{

     
    protected $title = 'Order User';
 

     protected function grid(){

        $grid = new Grid(new Order());

        $grid->model()->orderBy('id', 'DESC');

       

        $grid->column('userIdUser.fname', __('User First Name'));
        $grid->column('userIdUser.lname', __('User Last Name'));
        
        $grid->column('fname', __('Order User First Name')); 
        $grid->column('lname', __('Order User Last Name')); 
        $grid->column('email', __('Email')); 
        $grid->column('address', __('Address'));
        $grid->column('country', __('Country'));
        $grid->column('city', __('City'));
        $grid->column('pincode', __('Pincode'));
        $grid->column('phone', __('Phone'));
        $grid->column('amount', __('Amount'));
        $grid->column('products', __('Product Quantity'));
        

        

        $grid->column('created_at', __('Created at'))->display(function ($value) {
            return Carbon::parse($value)->timezone('GMT+5:30')->format('Y-m-d');
        });
        
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

        $show = new Show(Order::findOrFail($id));



        $show->field('id', __('Id'));
       
        $show->field('userIdUser.fname', __('User First Name'));
       
        $show->field('userIdUser.lname', __('User Last Name'));
        
       
        $show->field('fname', __('Order User First Name')); 
       
        $show->field('lname', __('Order User Last Name')); 
       
        $show->field('email', __('Email')); 
       
        $show->field('address', __('Address'));
       
        $show->field('countryName.name', __('Country'));
       
        $show->field('city', __('City'));
       
        $show->field('pincode', __('Pincode'));
       
        $show->field('phone', __('Phone'));
       
        $show->field('amount', __('Amount'));
       
        $show->field('products', __('Product Quantity'));


        return $show;

    }



    /**

     * Make a form builder.

     *

     * @return Form

     */

    protected function form(){

    //     $form = new Form(new Blog());

    //     $form->select('category_id',__('Category'))->options(BlogCategory::pluck('name', 'id'))->default(null)->rules('required');

    //     $form->text('title', __('Title'));

    //     $form->textarea('short_content', __('Short Description'));
        

    //     $form->ckeditor('content', __('Content'));

    //     $form->image('image', __('Image'))->removable();
    //     $form->text('alt', __('Alt'));

    //     // $form->radio('redirect_type', __('Redirect Type'))->options(['1' => 'self', '2'=> '301', '3'=> '302'])->default('1');
    //     //  $form->text('url', __('Url'));

    //     $form->hidden('slug');

    //     $form->saving(function (Form $form) {

    //     $form->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',trim($form->title))));

    //     });

    //     $form->textarea('questions', __('FAQs questions'));
    //     $form->textarea('answers', __('FAQs answers'));
    //     $form->textarea('description', __('Seo Description'));

    //     $form->textarea('keywords', __('Seo Keywords'));

    //     $form->textarea('seo_title', __('Seo Title'));

    //     return $form;


}
}
