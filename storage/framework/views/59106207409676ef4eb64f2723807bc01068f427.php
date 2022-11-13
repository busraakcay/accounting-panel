
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('income-table')->html();
} elseif ($_instance->childHasBeenRendered('OSru2iB')) {
    $componentId = $_instance->getRenderedChildComponentId('OSru2iB');
    $componentTag = $_instance->getRenderedChildComponentTagName('OSru2iB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OSru2iB');
} else {
    $response = \Livewire\Livewire::mount('income-table');
    $html = $response->html();
    $_instance->logRenderedChild('OSru2iB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/income/index.blade.php ENDPATH**/ ?>