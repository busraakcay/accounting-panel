
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card card-custom  gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Faturalar</h3>
            </div>
            <div class="card-toolbar">
                <a href="<?php echo e(route('create-bill')); ?>" class="btn btn-primary font-weight-bolder mr-2">
                    Fatura Ekle</a>
                <a href="<?php echo e(route('bill-type')); ?>" class="btn btn-warning font-weight-bolder">
                    Fatura Türü Ekle</a>

            </div>
        </div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('bill-table')->html();
} elseif ($_instance->childHasBeenRendered('3zYl7IF')) {
    $componentId = $_instance->getRenderedChildComponentId('3zYl7IF');
    $componentTag = $_instance->getRenderedChildComponentTagName('3zYl7IF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3zYl7IF');
} else {
    $response = \Livewire\Livewire::mount('bill-table');
    $html = $response->html();
    $_instance->logRenderedChild('3zYl7IF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/bill/index.blade.php ENDPATH**/ ?>