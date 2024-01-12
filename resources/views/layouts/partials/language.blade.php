<style>
    .lang-wrap .switch {
        position: relative;
        display: inline-block;
        width: 90px;
        height: 34px;
    }

    .lang-wrap .switch input {
        display: none;
    }

    .lang-wrap .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ca2222;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50px;
        height: 100%;
    }

    .lang-wrap .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
    }

    .lang-wrap input:checked+.slider {
        background-color: #2ab934;
    }

    .lang-wrap input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    .lang-wrap input:checked+.slider:before {
        -webkit-transform: translateX(55px);
        -ms-transform: translateX(55px);
        transform: translateX(55px);
    }


    /*------ ADDED CSS ---------*/

    .lang-wrap .on {
        display: none;
    }

    .lang-wrap .on,
    .lang-wrap .off {
        color: white;
        position: absolute;
        transform: translate(-25%, -50%);
        top: 50%;
        left: 50%;
        font-size: 14px;
        font-weight: 800;
    }
    .lang-wrap .japanese.on {
        transform: translate(-75%, -50%);
    }

    .lang-wrap input:checked+.slider .on {
        display: block;
    }

    .lang-wrap input:checked+.slider .off {
        display: none;
    }

    .lang-wrap {
        position: fixed;
        right: 5px;
        top: 5px;
    }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="lang-wrap">
    <label class="switch">
        <input type="checkbox" id="togBtn" {{session()->get('locale')=='en' ? 'checked': ''}}>
        <div class="slider round">
            <span language='japanese' class="japanese on">CHI</span>
            <span language='english' class="english off">ENG</span>
        </div>
    </label>
</div>
<script>
    $('document').ready(function() {


        $('.lang-wrap #togBtn').on('change', function(e) {


            var lan = $(this).prop('checked') ? 'en' : 'cn';

            e.preventDefault();

            $.ajax({
                type: 'get',
                url: "{{route('select_language')}}",
                data: {
                    'lang': lan
                },
                success: function() {
                    location.reload();
                }
            });

        });



    })
</script>