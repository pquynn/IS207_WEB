<!-- Start of edit address modal -->
    <!-- use modal of bootstrap to style edit address. modified 10/27/2023 by Quyen -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="edit-address" tabindex="-1" aria-labelledby="modal-address" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header" style="border-bottom: none;">
            <h1 class="modal-title fs-5" id="modal-address">ĐỊA CHỈ</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row row-gap-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder=" Họ và tên*" required>
                            <label for="name"> Họ và tên*</label>
                        </div>
                        
                        <div class="form-floating">
                            <input type="text" class="form-control" id="phonenumber" placeholder=" Số điện thoại*" required>
                            <label for="phonenumber"> Số điện thoại*</label>
                        </div>
                
                        <div class="form-floating">
                            <input type="text" class="form-control" id="province" placeholder=" Tỉnh*" required>
                            <label for="province"> Tỉnh*</label>
                        </div>
                
                        <div class="form-floating">
                            <input type="text" class="form-control h-50" id="district" placeholder=" Quận/huyện*" required>
                            <label for="district"> Quận/huyện*</label>
                        </div>
                
                        <div class="form-floating">
                            <input type="text" class="form-control" id="specificaddress" placeholder=" Địa chỉ cụ thể*" required>
                            <label for="specificaddress"> Địa chỉ cụ thể*</label>
                        </div>

                        <div class="btn-container">
                            <button class="btn btn-confirm" onclick="savechange()" style="width: 100%;">Lưu thay đổi</button>
                            <button class="btn btn-cancel" onclick="cancel()" data-bs-dismiss="modal" style="width: 100%;">Hủy</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        </div>
    </div>
    <!-- End of edit address modal -->