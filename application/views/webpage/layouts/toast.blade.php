@php
    $CI = &get_instance();
@endphp

<div id="toast" class="toast-app {{ $CI->session->flashdata("success") ? 'success' : 'failed' }}">
    <?php
    if ($CI->session->flashdata("success")['message']) {
        echo $CI->session->flashdata("success")['message'];
    } elseif ($CI->session->flashdata("failed")['message']) {
        echo $CI->session->flashdata("failed")['message'];
    }
    ?>
    <div class="close">X</div>
</div>
<script>
    window.onload = function() {
        const hideToast = () => {
            console.log("Hide toast");
            let seconds = 3000

            let timeout = setTimeout(() => {
                document.getElementById('toast').classList.remove('show')
                document.getElementById('toast').classList.add('hide')
                console.log("timeout");
            }, seconds);
        }

        $(document).ready(function() {
            console.log("Ready");
            hideToast()

            $('.close').on('click', function() {
                $('#toast').toggleClass('hide')
            })
        })
    }
</script>