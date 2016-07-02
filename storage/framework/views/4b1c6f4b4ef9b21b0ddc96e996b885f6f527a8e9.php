<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <button class="btn btn-xs btn-success add-modal pull-right" value=""><i class="glyphicon glyphicon-plus-sign"></i> Add new Car</button></div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                            <th>Brand</th>
                            <th>Model</th>
                            <th> Year </th>
                            <th>Edit</th>
                            <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id='tbody'>
                                <?php foreach($cars as $car): ?>
                                <tr id='<?php echo e($car->id); ?>'>
                         <td id='carBrand<?php echo e($car->id); ?>'><?php echo e($car->Brand); ?></td>
                          <td id='carModel<?php echo e($car->id); ?>'><?php echo e($car->model); ?></td>
                           <td id='carYear<?php echo e($car->id); ?>'><?php echo e($car->production_year); ?></td>
                             <td><button data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-primary open-modal" value="<?php echo e($car->id); ?>"><i class="glyphicon glyphicon-edit"></i> Edit</button></td>
                             <td><button class="btn btn-xs btn-danger delete" value="<?php echo e($car->id); ?>"><i class="glyphicon glyphicon-trash"></i>Delete</button></td>
                                </tr>
                                     <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                   

</div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal"   data-backdrop="static" 
   data-keyboard="false" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class='close-modal'>&times;</span></button>
        <h4 class="modal-title">Edit Car</h4>
      </div>
      <div class="modal-body">
          <div class="container">
              <div class='row'>
          <div class="col-md-4">
              <form method="post">
                  <div class="form-group">
                      <label>Brand : </label>
                      <input type="text" id="brand" name='brand' class="form-control">
                      
                  </div>
                    <div class="form-group">
                      <label>Model : </label>
                      <input type="text"  id='model' name='model' class="form-control">
                      
                  </div>
                    <div class="form-group">
                      <label>Year: </label>
                      <input type="number" name='year' id='year' class="form-control">
                      
                  </div>
               
              </form>
          </div></div>
          </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-modal" >Close</button>
        <button type="button" class="btn btn-primary update" >Save changes</button>
       <button type="button" class="btn btn-success add" >Add new</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
   <script>
        var token = '<?php echo e(Session::token()); ?>';
         var url = "<?php echo e(route('home')); ?>";
       var urlEdit = "<?php echo e(route('car.update')); ?>";
         var urlAdd = "<?php echo e(route('car.add')); ?>";

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>