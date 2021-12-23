    <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{config('global.siteTitle')}} {{date('Y')}}</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- FONT_AWESOME CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Toastr -->
{{--@toastr_js--}}
{{--@toastr_render--}}
@yield('js')
@yield('componentJs')

</body>

</html>
