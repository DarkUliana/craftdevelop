<!-- BEGIN scripts -->
<script type="text/javascript" src="{{ asset('js/frontend/app.js') }}"></script>

@if(Request::is('blog'))
    <script type="text/javascript" src="{{ asset('js/frontend/blog.js') }}"></script>
@endif

@if(Request::is('roadmap'))
    <script type="text/javascript" src="{{ asset('js/frontend/roadmap.js') }}"></script>
@endif
<!-- END scripts -->
</body>
</html>