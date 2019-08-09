@extends('client.layouts.main')
@section('title','cart')
@section('content')
	

	<!-- main -->
	<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Giỏ hàng</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Thanh toán</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Hoàn tất thanh toán</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Chi tiết sản phẩm</span>
							</div>
							<div class="one-eight text-center">
								<span>Giá</span>
							</div>
							<div class="one-eight text-center">
								<span>Số lượng</span>
							</div>
							<div class="one-eight text-center">
								<span>Tổng</span>
							</div>
							<div class="one-eight text-center">
								<span>Xóa</span>
							</div>
						</div>
						@forelse (Cart::getContent() as $item)
						<div class="product-cart">
								<div class="one-forth">
									<div class="product-img">
										<img class="img-thumbnail cart-img" src="/assets/client/images/ao-so-mi-hoa-tiet-den-asm1223-10191.jpg">
									</div>
									<div class="detail-buy">
										<h4>Mã : {{ $item->id }}</h4>
										<h5>{{ $item->name }}</h5>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price">{{ number_format($item->price) }} đ</span>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<input type="number" id="quantity" name="quantity"
											class="form-control input-number text-center input-quantity" data-id="{{ $item->id }}" value="{{ $item->quantity }}">
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<span class="price summed-price">{{ number_format($item->price*$item->quantity) }} đ</span>
									</div>
								</div>
								<div class="one-eight text-center">
									<div class="display-tc">
										<a href="#" class="closed"></a>
									</div>
								</div>
							</div>
						@empty
							<p>giỏ hàng trống quay lại mua hàng</p>
						@endforelse
						
						{{-- <div class="product-cart">
							<div class="one-forth">
								<div class="product-img">
									<img class="img-thumbnail cart-img" src="/assets/client/images/ao-so-mi-trang-kem-asm836-8193.jpg">
								</div>
								<div class="detail-buy">
									<h4>Mã : SP01</h4>
									<h5>Áo Khoác Nam Đẹp</h5>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">680.000 đ</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="number" id="quantity" name="quantity"
										class="form-control input-number text-center" value="1">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">1.200.000 đ</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div> --}}


					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">

								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Tổng:</span> <span>{{ number_format(Cart::getSubTotal()) }} đ</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Tổng cộng:</strong></span> <span>{{ number_format(Cart::getTotal()) }} đ</span></p>
											<a href="checkout.html" class="btn btn-primary">Thanh toán <i
													class="icon-arrow-right-circle"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end main -->
		@endsection
		@push('js')

<script>
		$(document).ready(function() {
			$.ajaxSetup({
    		headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

			$('.input-quantity').change(function(){
				let data= {
					id: $(this).attr('data-id'),
					quantity : $(this).val()
				};

				let _this = $(this);

				$.ajax({
					url : '/gio-hang/update',
					data: data,
					method: "POST",
					success: function(scs) {
						_this.parents('.product-cart').find('.summed-price').text(`${scs.summedPrice} đ`);
					},
					error : function() {

					}
				});
			});
			
		});
</script>

@endpush