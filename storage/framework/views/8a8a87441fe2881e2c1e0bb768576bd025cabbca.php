<div class="row justify-content-between mb-md-10">
    <div class="col-xxl-12 col-lg-12 col-md-12 col-12 border-bottom mb-5">
        <div class="form-check form-switch ml-2 mb-5">
            <input type="hidden" name="taxable" value="0" id="taxable">
            <input class="form-check-input" type="checkbox" role="switch" id="taxable" name="taxable" value="1" <?php if(isset($quote->taxable)): ?> <?php if(!empty($quote->taxable)): ?> checked <?php endif; ?> <?php else: ?> checked <?php endif; ?>>
            <label class="form-check-label" for="taxable"><?php echo e(__('Taxable')); ?></label>
        </div>
    </div>
</div><?php /**PATH D:\wamp\www\RMS_IMS\resources\views/quotes/updateformgroup.blade.php ENDPATH**/ ?>