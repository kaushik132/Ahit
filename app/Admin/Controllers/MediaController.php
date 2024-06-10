<?php



namespace App\Admin\Controllers;



use App\Media_file;

use Encore\Admin\Controllers\AdminController;

use Encore\Admin\Form;

use Encore\Admin\Grid;

use Encore\Admin\Show;

use Illuminate\Support\MessageBag;





class MediaController extends AdminController{

    /**

     * Title for current resource.

     *

     * @var string

     */

    protected $title = 'Media file List';



    /**

     * Make a grid builder.

     *

     * @return Grid

     */

    protected function grid(){

        $grid = new Grid(new Media_file());


        $grid->column('name', __('Image'))->image(url('/storage/'), 100, 150);

        $grid->column('slug')->display(function () {
            return $this->slug  . $this->name;
        });

          
        return $grid;

     }

    protected function detail($id){

         $show = new Show(Media_file::findOrFail($id));
        
         $show->field('name', __('Name'));
        
         return $show;
      }


    protected function form(){

        $form = new Form(new Media_file());

        $form->image('name', __('Image'))
               ->move('mediafile')
              ->uniqueName()->removable();
       
        return $form;

    }

}

