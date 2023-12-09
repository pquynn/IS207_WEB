<div class="modal fade" id="edit-order-status">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title">Trạng thái đơn hàng</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form action class="edit-status">
                <!--Body-->
                <div class="modal-body">                    
                    <input class="form-check-input" type="radio" name="status-order" id="status1" value="prepare">
                    <label class="form-check-label" for="status1">
                    Đang chuẩn bị hàng
                    </label><br>
                    <input class="form-check-input" type="radio" name="status-order" id="status2" value="shipping">
                    <label class="form-check-label" for="status2">
                    Đang giao hàng
                    </label><br>
                    <input class="form-check-input" type="radio" name="status-order" id="status3" value="order-success">
                    <label class="form-check-label" for="status3">
                    Giao thành công
                    </label><br>
                    <input class="form-check-input" type="radio" name="status-order" id="status4" value="order-cancel">
                    <label class="form-check-label" for="status4">
                    Đã hủy
                    </label>
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