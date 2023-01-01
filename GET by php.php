<!-- html part  -->
        <form action="" method="post">

            <label for="country">Country</label>
            <input type="text" id="country" name="country">
            <button type="submit" name="button1" value="button1" id="button1" class="btn ">Click me</button>

        </form>



<!-- =============== api call in PHP -->
<?php

if (isset($_POST['button1'])) {

    $curl = curl_init();
    $countryname = $_POST['country'];;
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://covid-193.p.rapidapi.com/statistics?country=$countryname",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: covid-193.p.rapidapi.com",
            "X-RapidAPI-Key: 914db986d3msha2998d380dc51d6p1d181fjsnbbb7c5f6a624"
        ],
    ]);

    $response = curl_exec($curl);
    $result = json_decode($response, true);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // echo $res;

?>
        <pre>
       <?php
        print_r($result);

        ?>
  </pre>

<?php
        $res = $result['response'];
        foreach ($res as $arr) {
            // print_r($arr);
            $continent =  $arr['continent'];
            $country =  $arr['country'];
            $population =  $arr['population'];
            $cases =  $arr['cases'];
            $deaths =  $arr['deaths'];
            $tests =  $arr['tests'];
            $date =  $arr['day'];
            $time =  $arr['time'];

            echo 'Continent =' . $continent . '<br>';
            echo 'country =' . $country . '<br>';
            echo 'population =' . $population . '<br>';
            echo 'day =' . $day . '<br>';
            echo 'time =' . $time . '<br><br>';

            echo 'New cases =' . $cases['new'] . '<br>';
        }
    }
}
?>
