<!-- Not have Form validate, alert event. Modified 10/23/2023 by Quyen -->

<!-- start of Modal of Add new elements-->
<!-- Modified 10/22/2023 by Quyen -->
<div class="modal fade modal-lg add-new-container" id="add-new" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#add-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add-product">Thêm mới sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" class="add-new-product">
                    <div class="row g-2">
                        <!-- start of 1st column -->
                        <div class="col">
                            <label for="product-name" class="form-label">Tên giày</label>
                            <input type="text" id="product-name" class="form-control">


                            <label for="product-price" class="form-label">Giá</label>
                            <input type="number" id="product-price" class="form-control" min="0" step="1">

                            <div class="row g-2">
                                <div class="col">
                                    <label for="product-size" class="form-label">Kích thước</label>
                                    <select id="product-size" class="form-select">
                                        <option value="" disabled selected hidden></option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="product-quantity" class="form-label">Số lượng</label>
                                    <input type="number" id="product-quantity" class="form-control" min="0" step="1">
                                </div>
                            </div>

                            <label for="product-name" class="form-label">Hình ảnh</label>
                            <input type="file" id="product-name" class="form-control">
                            <div class="image-box"></div>
                        </div>
                        <!-- end of 1st column -->
                        
                        <!-- start of 2nd column -->
                        <div class="col">
                            <label for="product-color" class="form-label">Màu sắc</label>
                            <input type="text" id="product-color" class="form-control">
                            
                            <label for="product-category" class="form-label">Phân loại</label>
                            <select id="product-category" class="form-select">
                                <option value="" disabled selected hidden></option>
                                <option value="giày thể thao">Giày thể thao</option>
                                <option value="giày nữ">Giày nữ</option>
                                <option value="giày nam">Giày nam</option>
                            </select>

                            <label for="product-description" class="form-label">Mô tả</label>
                            <textarea id="product-description" class="form-control"></textarea>

                        </div>
                        <!-- end of 2nd column -->
                    </div>
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