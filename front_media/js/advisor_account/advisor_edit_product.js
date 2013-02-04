$(document).ready(function() {
	$('#product_sub').click(function(){
		$("#createProductForm").validate({
			rules: {
				name: {
					required: true
				},
				category: {
					required: true
				},
				category_2: {
					required: true
				},
				price: {
					required: true,
					number: true
				}
			},
			messages: {
				name: {
					required: "Please enter a title for your product"
				},
				category: {
					required: "Please select a category"
				},
				category_2: {
					required: "Please select a sub-category"
				},
				price: {
					required: "Enter the price of this product",
					number: "Only digits accepted here"
				} 
			}
			
		});
	});
});