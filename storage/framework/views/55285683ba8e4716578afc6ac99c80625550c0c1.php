
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('company-table')->html();
} elseif ($_instance->childHasBeenRendered('9QMx5UM')) {
    $componentId = $_instance->getRenderedChildComponentId('9QMx5UM');
    $componentTag = $_instance->getRenderedChildComponentTagName('9QMx5UM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9QMx5UM');
} else {
    $response = \Livewire\Livewire::mount('company-table');
    $html = $response->html();
    $_instance->logRenderedChild('9QMx5UM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/company/index.blade.php ENDPATH**/ ?>