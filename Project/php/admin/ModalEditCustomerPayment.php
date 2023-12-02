<div class="modal fade" id="edit-customer-payment">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title">Thông tin người nhận</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form action class="edit-customer-payment">
                <!--Body-->
                <div class="modal-body">                    
                    <select class="form-select" aria-label="Default select example" id="select-payment-method" onchange="PaymentInfo('payment-information', this)">
                        <option value="0">COD</option>
                        <option value="1" select>Chuyển khoản</option>
                    </select>

                        <div id="payment-information">
                            <label for="payment-information-method" class="form-label">Chuyển khoản qua </label>
                            <input type="text" placeholder="Momo" class="form-control" id="payment-information-method">

                            <label for="payment-information-account" class="form-label">Thông tin tài khoản </label>
                            <input type="text" placeholder="0912 345 678" class="form-control" id="payment-information-account">
                        </div>
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
<script scr="../../js/admin/Order/order-detail">
    function PaymentInfo(divID, element) {
    document.getElementById(divID).style.display = element.value == 1? 'block': 'none';
}
</script>