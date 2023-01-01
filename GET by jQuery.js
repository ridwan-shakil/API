// Html part 

            <label for="country">Country</label>
            <input type="text" id="country" name="country">
            <button type="submit" name="button1" value="button1" id="button1" class="btn ">Click me</button>


// API call in jQuery 
<script>
    jQuery(document).ready(function() {
        // Get value on button click and show alert
        jQuery("#button1").click(function() {
            var country = jQuery("#country").val();

            // alert(country);

            const settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://covid-193.p.rapidapi.com/statistics?country=" + country,
                "method": "GET",
                "headers": {
                    "X-RapidAPI-Key": "914db986d3msha2998d380dc51d6p1d181fjsnbbb7c5f6a624",
                    "X-RapidAPI-Host": "covid-193.p.rapidapi.com"
                }
            };

            jQuery.ajax(settings).done(function(response) {
                // console.log(response);
                var response = response.response;
                var cases = response[0]['cases'];
                var death = response[0]['deaths'];
                var tests = response[0]['tests'];

                jQuery('#cases').html('cases = ' + cases['recovered']);


            });



        });
    });
</script>
