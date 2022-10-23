
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('branch-table')->html();
} elseif ($_instance->childHasBeenRendered('CeXsk80')) {
    $componentId = $_instance->getRenderedChildComponentId('CeXsk80');
    $componentTag = $_instance->getRenderedChildComponentTagName('CeXsk80');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('CeXsk80');
} else {
    $response = \Livewire\Livewire::mount('branch-table');
    $html = $response->html();
    $_instance->logRenderedChild('CeXsk80', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/branch/index.blade.php ENDPATH**/ ?>