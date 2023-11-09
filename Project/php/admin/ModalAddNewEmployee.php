<!-- start of Modal of Add new elements-->
<!-- Modified 10/23/2023 by Quyen -->
<div class="modal fade modal-md add-new-container" id="add-new" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#add-employee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add-employee">Thêm mới nhân viên</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" class="add-new-employee">
                
                    <label for="employee-phone" class="form-label">Điện thoại</label>
                    <input type="tel" id="employee-phone" class="form-control">

                    <label for="employee-name" class="form-label">Tên nhân viên</label>
                    <input type="text" id="employee-name" class="form-control">

                    <label for="employee-email" class="form-label">Email</label>
                    <input type="email" id="employee-email" class="form-control">

                    <div class="row g-2">
                        <div class="col">
                            <label for="employee-date-of-birth" class="form-label">Ngày sinh</label>
                            <input type="date" id="employee-date-of-birth" class="form-control">
                        </div>

                        <div class="col">
                            <label for="employee-gender" class="form-label">Giới tính</label>
                            <select id="employee-gender" class="form-select">
                                <option value="" disabled selected hidden></option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                    
                    </div>

                    <label for="employee-address" class="form-label">Địa chỉ</label>
                            <textarea id="employee-address" class="form-control"></textarea>

                    <label for="employee-role" class="form-label">Vai trò</label>
                    <select id="employee-role" class="form-select">
                        <option value="" disabled selected hidden></option>
                        <option value="Quản lý">Quản lý</option>
                        <option value="Nhân viên">Nhân viên</option>
                    </select>
                        
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel admin" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-confirm admin">Thêm mới</button>
            </div>

        </div>
    </div>
</div>
<!-- end of Modal of Add new elements-->