
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('income-table')->html();
} elseif ($_instance->childHasBeenRendered('rxdjk67')) {
    $componentId = $_instance->getRenderedChildComponentId('rxdjk67');
    $componentTag = $_instance->getRenderedChildComponentTagName('rxdjk67');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rxdjk67');
} else {
    $response = \Livewire\Livewire::mount('income-table');
    $html = $response->html();
    $_instance->logRenderedChild('rxdjk67', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/income/index.blade.php ENDPATH**/ ?>