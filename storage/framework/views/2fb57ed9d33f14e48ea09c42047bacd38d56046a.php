
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('expense-table')->html();
} elseif ($_instance->childHasBeenRendered('TuQ6KTu')) {
    $componentId = $_instance->getRenderedChildComponentId('TuQ6KTu');
    $componentTag = $_instance->getRenderedChildComponentTagName('TuQ6KTu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TuQ6KTu');
} else {
    $response = \Livewire\Livewire::mount('expense-table');
    $html = $response->html();
    $_instance->logRenderedChild('TuQ6KTu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/expense/index.blade.php ENDPATH**/ ?>