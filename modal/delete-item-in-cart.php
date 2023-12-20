<!-- Modal Delete to Cart-->
<div class="modal fade" id="modallDeleteItemInCart<?php echo $row['cart_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-delete-item">
            <form action="actions/delete-to-cart-function.php" method="POST">
                <div class="modal-header">
                    <h1 class="fs-5">Remove to My Cart</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cart_id" value="<?php echo $row['cart_id'];?>">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                    <p>Are your sure you want remove this to your cart?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button name="delete" type="submit" role="button" class="btn btn-success">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>