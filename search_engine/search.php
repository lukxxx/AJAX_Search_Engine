<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<title>Search</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="../assets/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        $('.result').css({display: 'block'});
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("engine.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
            $('.result').css({display: 'none'});
        }
    });
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="row">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="search-box">
                                    <input style="border-radius:30px; padding-left: 10px; outline: 0 !important;" 
                                    type="text" class="form-control" autocomplete="off" placeholder="Search..." >
                                    <div class="result" style="display: none; margin-top: -1vw;padding: 20px; border-left: 1px solid #E0E3E7; border-right: 1px solid #E0E3E7; 
                                    border-bottom: 1px solid #E0E3E7; border-radius: 0px 0px 20px 20px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
