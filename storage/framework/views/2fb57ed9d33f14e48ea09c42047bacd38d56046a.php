
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('expense-table')->html();
} elseif ($_instance->childHasBeenRendered('Q5JvFy6')) {
    $componentId = $_instance->getRenderedChildComponentId('Q5JvFy6');
    $componentTag = $_instance->getRenderedChildComponentTagName('Q5JvFy6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Q5JvFy6');
} else {
    $response = \Livewire\Livewire::mount('expense-table');
    $html = $response->html();
    $_instance->logRenderedChild('Q5JvFy6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/expense/index.blade.php ENDPATH**/ ?>