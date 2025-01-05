
<script>
$(document).ready(function() {
    pageLoad();
    $(document).on('change','#city_sort_search', function() {
        pageLoad();
    });

    $(document).on('keydown', '#dealer_name', function(e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        e.preventDefault();
        pageLoad();
    }
});


    $(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];

    console.log(page);
    pageLoad(page);
});

    //auto list filter start here
function pageLoad(page = 1) {

    $(document).ready(function(){

        var loaderId = 'loading_dealer';
        var loader = '<div id="loading_dealer" style="position: fixed; width: 100%; height: 100%; display: block; background-color: rgba(218, 233, 232, 0.7); left: 0; top: 0;"></div>';
        if ($('#' + loaderId).length) {
        $('#' + loaderId).remove();
        }
        $('#main_container').append(loader);
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body
        .clientWidth;
        var screenHeight = window.innerHeight || document.documentElement.clientHeight || document.body
            .clientHeight;

        if (screenWidth < 1000) {
            // loader;
            var city = $('#city_sort_search').val();
            var name = $('#dealer_name').val();
            $.ajax({
                url: "{{ route('frontend.find.dealership') }}?page=" + page,
                type: "get",
                data: {

                    city: city,
                    name: name,

                },
                success: function(res) {
                    // $('#total-count').text(res.total_count);

                    $('#main_container').html(res.view);

                },
                error: function(error) {

                }
            });

        } else {

            var city = $('#city_sort_search').val();
            var name = $('#dealer_name').val();
            // var rangerYearMaxPriceSlider = $('#firstFilterMakeInput').val();
            $.ajax({
                url: "{{ route('frontend.find.dealership') }}?page=" + page,
                type: "get",
                data: {
                    city: city,
                    name: name,

                },
                success: function(res) {

                    $('#main_container').html(res.view);

                },
                error: function(error) {

                }
            });
        }
    });
}
});
</script>








