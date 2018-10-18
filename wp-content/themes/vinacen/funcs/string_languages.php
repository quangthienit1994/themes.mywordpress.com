<?php
function register_strings(){
	pll_register_string('Xem chi tiết','Read more', 'vinacen');
	pll_register_string('Sắp xếp','Sort by', 'vinacen');
	pll_register_string('Hiển thị','Show', 'vinacen');
	pll_register_string('Mỗi trang','Per page', 'vinacen');
	pll_register_string('Bộ lọc đã chọn','Selected filters', 'vinacen');
	pll_register_string('Chưa chọn bộ lọc','No filters selected', 'vinacen');
	pll_register_string('Danh sách thẻ của sản phẩm','Product tags', 'vinacen');
	pll_register_string('Xóa tất cả','Clear all', 'vinacen');
	pll_register_string('Danh mục sản phẩm','Product categories', 'vinacen');
	pll_register_string('Loại sản phẩm','Product Types', 'vinacen');
	pll_register_string('Màu của sản phẩm','Product color', 'vinacen');
	pll_register_string('Lọc những sản phẩm','Filter products', 'vinacen');
	pll_register_string('Những sản phẩm giảm giá','Show only products on sale', 'vinacen');
	pll_register_string('Những sản phẩm còn hàng','Show only products in stock', 'vinacen');

	pll_register_string('Mặc định','Default', 'vinacen');
	pll_register_string('Phổ biến','Popularity', 'vinacen');
	pll_register_string('Tỷ lệ đánh giá','Average rating', 'vinacen');
	pll_register_string('Giá: giảm đến tăng','Price: low to high', 'vinacen');
	pll_register_string('Giá: tăng đến giảm', 'vinacen');
	pll_register_string('Ngẫu nhiên','Random products', 'vinacen');
	pll_register_string('Sắp','by', 'vinacen');
}
add_action('init','register_strings');