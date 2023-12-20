<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered change-status">
        <form action="actions/admin-update-order.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Update Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <p>Delivery Status</p>
                            <select class="form-select" name="shipping_status" aria-label="Default select example">
                                <option value="Preparing Your Order">Preparing Your Order</option>
                                <option value="To Ship Your Order">To Ship Your Order</option>
                                <option value="To Received Your Order">To Received Your Order</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <p>Received by</p>
                            <input type="date" class="input-date" name="receive_by_date">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <input type="text" class="input-date order-date" disabled="true" value="<?php echo $row['receive_by'];?>">
                            <input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" role="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>