<div class="modal fade" id="edit-customer-payment">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title">Phương thức thanh toán</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form action class="edit-customer-payment">
                <!--Body-->
                <div class="modal-body">                    
                    <input type="text" placeholder="Nhập phương thức thanh toán" id="customer-pay" class="form-control"><br>
                </div>

                <!--Footer-->
                <div class="modal-footer edit">
                    <button type="button" class="btn btn-cancel admin" data-bs-dismiss="modal">Hủy</button>
                    <input type="submit" class="btn btn-confirm admin" value="Xác nhận">
                </div>
            </form>
        </div>
    </div>
</div>
<script scr="../../js/admin/Order/order-detail"></script>