
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('branch-table')->html();
} elseif ($_instance->childHasBeenRendered('2KAosjr')) {
    $componentId = $_instance->getRenderedChildComponentId('2KAosjr');
    $componentTag = $_instance->getRenderedChildComponentTagName('2KAosjr');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2KAosjr');
} else {
    $response = \Livewire\Livewire::mount('branch-table');
    $html = $response->html();
    $_instance->logRenderedChild('2KAosjr', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/branch/index.blade.php ENDPATH**/ ?>