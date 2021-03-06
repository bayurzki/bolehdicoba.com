@php
    $CI = &get_instance();
@endphp

<div id="toast" class="toast-app {{ $CI->session->flashdata("success") ? 'success' : 'failed' }}" x-data="toastState()" :class="show ? 'show' : 'hide'">
    <?php
    if ($CI->session->flashdata("success")['message']) {
        echo $CI->session->flashdata("success")['message'];
    } elseif ($CI->session->flashdata("failed")['message']) {
        echo $CI->session->flashdata("failed")['message'];
    }
    ?>
    <div class="close" @click="setShow">X</div>
</div>
<script>
    window.onload = function() {
        console.log("Timeout"); 
        let timeout = 3000

        let hideToast = setTimeout(() => {
            document.getElementById('toast').classList.remove('show')
            document.getElementById('toast').classList.add('hide')
            console.log("Tetot waktu habis");
        }, timeout);
    }

    const toastState = () => {
        return {
            show: true,
            setShow() {
                this.show = !this.show
            }
        }
    }
</script>