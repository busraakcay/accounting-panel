
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('company-table')->html();
} elseif ($_instance->childHasBeenRendered('TY8rZzB')) {
    $componentId = $_instance->getRenderedChildComponentId('TY8rZzB');
    $componentTag = $_instance->getRenderedChildComponentTagName('TY8rZzB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TY8rZzB');
} else {
    $response = \Livewire\Livewire::mount('company-table');
    $html = $response->html();
    $_instance->logRenderedChild('TY8rZzB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/company/index.blade.php ENDPATH**/ ?>