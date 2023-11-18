<!-- Start of edit address modal -->
    <!-- use modal of bootstrap to style edit address. modified 10/27/2023 by Quyen -->
 
    <!-- Modal -->
    <div class="modal fade" id="edit-pass" tabindex="-1" aria-labelledby="modal-pass" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header" style="border-bottom: none;">
                    <h1 class="modal-title fs-5" id="modal-pass">ĐỔI MẬT KHẨU</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row row-gap-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="oldpassword" placeholder="Mật khẩu cũ*" required>
                                <label for="name">Mật khẩu cũ*</label>
                            </div>

                            <div class="form-floating">
                                <input type="text" class="form-control" id="newpassword" placeholder="Mật khẩu mới*" required>
                                <label for="phonenumber">Mật khẩu mới*</label>
                            </div>

                            <div class="btn-container">
                                <button class="btn btn-confirm" onclick="savechange()" style="width: 100%;">Lưu thay
                                    đổi</button>
                                <button class="btn btn-cancel" onclick="cancel()" data-bs-dismiss="modal"
                                    style="width: 100%;">Hủy</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of edit address modal -->