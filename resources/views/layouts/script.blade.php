<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">
    $('#categories').click(function(e){
        e.preventDefault();
        var filter_category = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}',
            data: {'filter_category':filter_category},
            success: function(data){
                $('.page').html(data);
            },
            error:function(err){
                console.log(err);
            }
        });
    });
	$('#sorting').change(function(){
        sorting = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{url('/')}}',
            data: {'sorting':sorting},
            success: function(data){
                $('.page').html(data);
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
	$('#sortingBy').change(function(){
        sortingBy = $(this).val();
        $.ajax({
            type: 'GET',
            url: '{{route('admin.products.index')}}',
            data: {'sortingBy':sortingBy},
            success: function(data){
                $('.page').html(data);
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
	


	$(document).ready(function(){
		$(".update-cart").click(function (e)
		{
			e.preventDefault();
			console.log('aaaa');
			var ele = $(this);

			$.ajax(
			{
				url: '{{ route('carts.update') }}',
				method: "patch",
				data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
				success: function(response)
				{
					window.location.reload();
				}
			});
		});

		$(".remove-from-cart").click(function (e)
		{
			e.preventDefault();

			var ele = $(this);

			if(confirm("Are you sure?"))
			{
				$.ajax(
				{
					url: '{{ route('carts.remove') }}',
					method: "DELETE",
					data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
					success: function(response)
					{
						window.location.reload();
					}
				});
			}
		});
	});
</script>
@stack('script')