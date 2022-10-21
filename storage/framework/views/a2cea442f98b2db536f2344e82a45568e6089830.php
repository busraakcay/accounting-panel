
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('branch-table')->html();
} elseif ($_instance->childHasBeenRendered('qzWZZOp')) {
    $componentId = $_instance->getRenderedChildComponentId('qzWZZOp');
    $componentTag = $_instance->getRenderedChildComponentTagName('qzWZZOp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qzWZZOp');
} else {
    $response = \Livewire\Livewire::mount('branch-table');
    $html = $response->html();
    $_instance->logRenderedChild('qzWZZOp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/branch/index.blade.php ENDPATH**/ ?>