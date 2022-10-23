
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('expense-table')->html();
} elseif ($_instance->childHasBeenRendered('5436S9U')) {
    $componentId = $_instance->getRenderedChildComponentId('5436S9U');
    $componentTag = $_instance->getRenderedChildComponentTagName('5436S9U');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5436S9U');
} else {
    $response = \Livewire\Livewire::mount('expense-table');
    $html = $response->html();
    $_instance->logRenderedChild('5436S9U', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/expense/index.blade.php ENDPATH**/ ?>