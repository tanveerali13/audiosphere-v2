</main>
    <script src="../js/script.js"></script>

    <script src="../js/myplaylist.js"></script>

    <script src="../js/search.js"></script>

    <!-- jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!-- cdn slick -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		$('.slider-holder').slick({
			infinite: true,
			slidesToShow: 7,
			slidesToScroll: 1,
			dots: false,
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1160,
                    settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 980,
                    settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                    }
                }
                ]
		});

	</script>

</body>

</html>

