<!-- Modified 10/23/2023 by Quyen -->
<div class="modal fade modal-md add-new-container" id="add-new" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#add-blog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add-blog">Thêm mới Blog</h1>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <form action="" class="add-new-blog needs-validation" novalidate>
                    <div class="modal-body">
                        <label for="blog-name" class="form-label">Tên blog</label>
                        <input type="text" id="blog-name" class="form-control" required>
                        <div class="invalid-feedback">
                            Yêu cầu nhập tên blog.
                        </div>

                        <label for="blog-content" class="form-label">Nội dung</label>
                        <textarea id="blog-content" class="form-control"></textarea>
                        
                        <label for="blog-img" class="form-label">Hình ảnh</label>
                        <input type="file" id="blog-img" class="form-control">
                        <div class="image-box" style="width: 100px;"></div>
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