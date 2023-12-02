<div class="modal fade" id="edit-customer-info">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title">Thông tin người nhận</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form action class="edit-customer-information">
                <!--Body-->
                <div class="modal-body">                    
                        <label for="customer-name" class="form-label">Họ tên</label>
                        <input type="text" placeholder="Nhập tên người nhận" id="customer-name" class="form-control"><br>

                        <label for="customer-tel" class="form-label">Số điện thoại</label>
                        <input type="tel" placeholder="0123456789" id="customer-tel" name="customer-tel"
                        pattern="[0-9]{4}[0-9]{3}[0-9]{3}" class="form-control">
                    
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