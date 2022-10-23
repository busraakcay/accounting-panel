
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card card-custom  gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Borçlarım</h3>
            </div>
        </div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('debt-table')->html();
} elseif ($_instance->childHasBeenRendered('4pmoK68')) {
    $componentId = $_instance->getRenderedChildComponentId('4pmoK68');
    $componentTag = $_instance->getRenderedChildComponentTagName('4pmoK68');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4pmoK68');
} else {
    $response = \Livewire\Livewire::mount('debt-table');
    $html = $response->html();
    $_instance->logRenderedChild('4pmoK68', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/debt/index.blade.php ENDPATH**/ ?>