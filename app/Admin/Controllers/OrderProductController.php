<?php



namespace App\Admin\Controllers;




use App\ItProductCart;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;

class OrderProductController extends AdminController{

     
    protected $title = 'Product Add to Cart';
 

     protected function grid(){

        $grid = new Grid(new ItProductCart());

        $grid->model()->orderBy('id', 'DESC');

       

        $grid->column('userID.fname', __('First Name'));
        $grid->column('userID.lname', __('Last Name'));
        
        $grid->column('title', __('Product Name')); 
        $grid->column('quantity', __('Product Quantity'));

        $grid->column('fixprice', __('Product price'));

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

        $show = new Show(ItProductCart::findOrFail($id));



        $show->field('id', __('Id'));
        $show->field('user_id', __('User Name'));
        $show->field('title', __('Product Name'));
        $show->field('quantity', __('Product Quantity'));
        $show->field('fixprice', __('Product price'));


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
