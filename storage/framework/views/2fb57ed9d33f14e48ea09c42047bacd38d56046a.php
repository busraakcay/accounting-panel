
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('expense-table')->html();
} elseif ($_instance->childHasBeenRendered('HL6YC38')) {
    $componentId = $_instance->getRenderedChildComponentId('HL6YC38');
    $componentTag = $_instance->getRenderedChildComponentTagName('HL6YC38');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HL6YC38');
} else {
    $response = \Livewire\Livewire::mount('expense-table');
    $html = $response->html();
    $_instance->logRenderedChild('HL6YC38', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/expense/index.blade.php ENDPATH**/ ?>