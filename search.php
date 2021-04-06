<?php include_once "includes/header.php";?>

<div class="textbox-container">
    <input type="text" class="search__input" placeholder="Search for something">
</div>

<div class="results"></div>

<script>
    $(function() {
        var username = '<?php echo $userLoggedIn;?>';
        var timer;
        $(".search__input").keyup(function() {
            clearTimeout(timer);

            timer = setTimeout(function() {
                var val = $(".search__input").val();
                if(val) {
                    $.post("ajax/getSearchResults.php", {term: val, username}, function(data) {
                        $(".results").html(data);
                    });
                } else {
                    $(".results").html("");
                }
            }, 500);

        });
    });
</script>
