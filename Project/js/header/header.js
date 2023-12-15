$('docunment').ready(function (){
    $('.material-symbols-outlined').click(function () {
        // Tạo URL mới với tham số truyền vào là tên sản phẩm
        var url = '../../store/cart-checkout/cart.php';
  
        // Chuyển hướng đến trang mới
        window.location.href = url;
      });
})