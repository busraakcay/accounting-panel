
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('branch-table')->html();
} elseif ($_instance->childHasBeenRendered('Ze6w6WT')) {
    $componentId = $_instance->getRenderedChildComponentId('Ze6w6WT');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ze6w6WT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ze6w6WT');
} else {
    $response = \Livewire\Livewire::mount('branch-table');
    $html = $response->html();
    $_instance->logRenderedChild('Ze6w6WT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/branch/index.blade.php ENDPATH**/ ?>