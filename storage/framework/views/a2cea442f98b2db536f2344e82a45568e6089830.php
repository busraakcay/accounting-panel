
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('branch-table')->html();
} elseif ($_instance->childHasBeenRendered('lq5T1my')) {
    $componentId = $_instance->getRenderedChildComponentId('lq5T1my');
    $componentTag = $_instance->getRenderedChildComponentTagName('lq5T1my');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lq5T1my');
} else {
    $response = \Livewire\Livewire::mount('branch-table');
    $html = $response->html();
    $_instance->logRenderedChild('lq5T1my', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/branch/index.blade.php ENDPATH**/ ?>