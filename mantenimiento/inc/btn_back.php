<style>
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #3273dc;
        color: #fff;
        border: none;
        border-radius: 30px;
        padding: 10px 20px;
        font-size: 16px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .btn-back:hover {
        background-color: #2755a1;
    }
    .btn-back i {
        margin-right: 8px;
    }
</style>


<p class="has-text-right pt-4 pb-4">
	<a href="#" class="button is-link is-rounded btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
</p>

<script type="text/javascript">
    let btn_back = document.querySelector(".btn-back");

    btn_back.addEventListener('click', function(e){
        e.preventDefault();
        window.history.back();
    });
</script>