<!-- To the right -->
<div class="float-right d-none d-sm-inline">
    <strong>Copyright &copy; 2014-2021 Suryani Catering.</strong>
  </div>
  <!-- Default to the left -->

  <script src="{!! asset('shop-assets/vendors/jquery/jquery-3.2.1.min.js')!!}"></script>
  <script src="{!! asset('shop-assets/vendors/bootstrap/bootstrap.bundle.min.js')!!}"></script>
  <script src="{!! asset('shop-assets/vendors/skrollr.min.js')!!}"></script>
  <script src="{!! asset('shop-assets/vendors/owl-carousel/owl.carousel.min.js')!!}"></script>
  <script src="{!! asset('shop-assets/vendors/nice-select/jquery.nice-select.min.js')!!}"></script>
  <script src="{!! asset('shop-assets/vendors/jquery.ajaxchimp.min.js')!!}"></script>
  <script src="{!! asset('shop-assets/vendors/mail-script.js')!!}"></script>
  <script src="{!! asset('shop-assets/js/main.js')!!}"></script>

<script>
    var rupiah = document.getElementById('price');
				rupiah.addEventListener('keyup', function(e){
					rupiah.value = formatRupiah(this.value);
				});

				/* Fungsi formatRupiah */
				function formatRupiah(angka){
					var number_string = angka.replace(/[^,\d]/g, '').toString(),
					split   		= number_string.split(','),
					sisa     		= split[0].length % 3,
					rupiah     		= split[0].substr(0, sisa),
					ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

					// tambahkan titik jika yang di input sudah menjadi angka ribuan
					if(ribuan){
						separator = sisa ? '.' : '';
						rupiah += separator + ribuan.join('.');
					}

					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
					return rupiah;
				}
</script>
