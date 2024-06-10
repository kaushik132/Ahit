<?php



namespace App\Admin\Controllers;



use App\Media_files;

use Encore\Admin\Controllers\AdminController;

use Encore\Admin\Form;

use Encore\Admin\Grid;

use Encore\Admin\Show;

use Illuminate\Support\MessageBag;





class MediaFileController extends AdminController{

    /**

     * Title for current resource.

     *

     * @var string

     */

    protected $title = 'Media files List';



    /**

     * Make a grid builder.

     *

     * @return Grid

     */

    protected function grid(){

        $grid = new Grid(new Media_files());


        $grid->column('name', __('Image'))->image(url('/storage/'), 100, 150);

        $grid->column('slug')->display(function () {
            return $this->slug  . $this->name;
        });

          
        return $grid;

     }

    protected function detail($id){

         $show = new Show(Media_files::findOrFail($id));
        
         $show->field('name', __('Name'));
        
         return $show;
      }


    protected function form(){

        $form = new Form(new Media_files());

        $form->image('name', __('Image'))
               ->move('mediafiles')
              ->uniqueName()->removable();
       
        return $form;

    }

}

