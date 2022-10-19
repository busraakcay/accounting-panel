
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card card-custom  gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Firmalar</h3>
            </div>
            <div class="card-toolbar">
                <a href="<?php echo e(route('create-company')); ?>" class="btn btn-primary font-weight-bolder">
                    Firma Ekle</a>
            </div>
        </div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('company-table')->html();
} elseif ($_instance->childHasBeenRendered('TxXpSZo')) {
    $componentId = $_instance->getRenderedChildComponentId('TxXpSZo');
    $componentTag = $_instance->getRenderedChildComponentTagName('TxXpSZo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TxXpSZo');
} else {
    $response = \Livewire\Livewire::mount('company-table');
    $html = $response->html();
    $_instance->logRenderedChild('TxXpSZo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/company/index.blade.php ENDPATH**/ ?>