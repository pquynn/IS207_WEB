<!-- Not have Form validate, alert event. Modified 10/23/2023 by Quyen -->
<!-- style the product size table in modal -->
<style>
    .product-size-table td{
        padding: 0 7px 10px !important;
    }

    .product-size-table th{
        padding: 0 7px !important;
    }
</style>

<!-- start of Modal of Add new elements-->
<!-- Modified 10/22/2023 by Quyen -->
<div class="modal fade modal-lg add-new-container" id="add-new" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#add-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add-product">Thêm mới sản phẩm</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>

            <form action="" id="modal-form" class="add-new-product need-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-2">
                        <!-- start of 1st column -->
                        <div class="col-6">
                            <div class="">
                                <label for="product-name" class="form-label">Tên giày</label>
                                <input type="text" id="product-name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Yêu cầu nhập tên giày.
                                </div>
                            </div>
                            
                            <div class="">
                                <label for="product-price" class="form-label">Giá</label>
                                <input type="number" id="product-price" class="form-control" min="0" step="1" required>
                                <div class="invalid-feedback">
                                    Yêu cầu nhập giá.
                                </div>
                            </div>

                            <div class="">
                                <label for="product-color" class="form-label">Màu sắc</label>
                                <input type="text" id="product-color" class="form-control" required>
                                <div class="invalid-feedback">
                                    Yêu cầu nhập màu sắc.
                                </div>
                            </div>
                            
                            <div class="">
                                <label for="product-categories" class="form-label">Phân loại</label>
                                <select id="product-categories" class="form-select" required>
                                    <!-- <option value="" disabled selected hidden></option>
                                    <option value="giày thể thao">Giày thể thao</option>
                                    <option value="giày nữ">Giày nữ</option>
                                    <option value="giày nam">Giày nam</option> -->
                                </select>
                                <div class="invalid-feedback">
                                    Yêu cầu chọn phân loại.
                                </div>
                            </div>
                            
                            <div class="">
                                <label for="product-description" class="form-label">Mô tả</label>
                                <textarea id="product-description" class="form-control" required></textarea>
                                <div class="invalid-feedback">
                                    Yêu cầu nhập mô tả.
                                </div>
                            </div>

                            <div class="">
                                <label for="product-name" class="form-label">Hình ảnh</label>
                                <input type="file" id="product-name" class="form-control" required multiple>
                                <div class="image-box"></div>
                                <div class="invalid-feedback">
                                    Yêu cầu chọn 3 hình ảnh cho sản phẩm.
                                </div>
                            </div>
                            
                        </div>
                        <!-- end of 1st column -->
                        
                        <!-- start of 2nd column -->
                        <div class="col-6">

                            <table class="product-size-table" style="min-width: 0;">
                                <thead>
                                    <tr>
                                        <th class="col-5" style="font-weight: normal;">
                                            <label for="product-size" class="form-label">Kích thước</label>
                                        </th>
                                        <th class="col-6" style="font-weight: normal;">
                                            <label for="product-quantity" class="form-label">Số lượng</label>
                                        </th>
                                        <th class="col-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select id="product-size" class="form-select" required>
                                                <option value="" disabled selected hidden></option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Yêu cầu chọn kích thuớc.
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" id="product-quantity" class="form-control" min="0" step="1" required>
                                            <div class="invalid-feedback">
                                                Yêu cầu nhập số lượng.
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn-admin btn-filter">Thêm</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                        
                        <!-- end of 2nd column -->
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel admin">Hủy</button>
                    <button type="submit" class="btn btn-confirm admin">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of Modal of Add new elements-->