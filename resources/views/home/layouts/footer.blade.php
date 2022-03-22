<!--Appointment Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="background: #11857a;">

            <div class="modal-body">
                <div class="modal-circle p-3">
                    <img width="100%" src="https://pngimg.com/uploads/stethoscope/stethoscope_PNG34.png" alt="">
                </div>
                <div class="card p-5 m-auto" style="background-color:#11857a;
    border: none;">

                    <div class="row">
                        <div class="col-md-12 pb-2">
                            <h2 class="help-title text-center text-white">
                                <b>Mediaids Help Center</b>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 help-form">
                            <form action="{{route('enquiry.store')}}" method="POST" class="m-auto">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-white" for="">Email Address</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-white" for="">Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <label class="text-white" for="">Query</label>
                                    <textarea class="form-control" id="" rows="3" name="query"></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn modal-send-button" style=" color: #fff;"> Send &nbsp;
                                    <i class="las la-arrow-right"></i></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="footer">
    <div class="social-icon-group">
        <a href="{{getSetting('facebook_link') ?? '#'}}" title="Facebook Link">
            <div class="footer-social-icon" style="background-color: #3e2cdc">
                <i class="lab la-facebook-f"></i>
            </div>
        </a>
        <a href="{{getSetting('instagram_link') ?? '#'}}" title="Instagram Link">
            <div class="footer-social-icon" style="background-color: #E1306C">
                <i class="lab la-instagram"></i>
            </div>
        </a>
        <a href="{{getSetting('skype_link') ?? '#'}}" title="Skype Link">
            <div class="footer-social-icon" style="background-color: #3cc8e8">
                <i class="lab la-skype"></i>
            </div>
        </a>
        <a href="{{getSetting('twitter_link') ?? '#'}}" title="Twitter Link">
            <div class="footer-social-icon" style="background-color: #3cc8e8">
                <i class="lab la-twitter"></i>
            </div>
        </a>
    </div>
    <div class="path">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-3">
                    <ul class="footer-col-title">
                        <h5 class="title">Company Information</h5>
                        <li>
                            <a href=""
                            ><i class="las la-arrow-right footer-arrow"></i>About us</a
                            >
                        </li>
                        <li>
                            <a href=""
                            ><i class="las la-arrow-right footer-arrow"></i> Swan
                                information</a
                            >
                        </li>
                        <li>
                            <a href=""
                            ><i class="las la-arrow-right footer-arrow"></i>Origin of
                                Nura Group</a
                            >
                        </li>
                        <li>
                            <a href=""
                            ><i class="las la-arrow-right footer-arrow"></i>Privacy
                                Policy</a
                            >
                        </li>
                        <li>
                            <a href="">
                                <i class="las la-arrow-right footer-arrow"></i>Shipping and
                                Return Policy</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer-col-title">
                        <h5 class="title">Other Links</h5>
                        <li>
                            <a href="">Who we Are ?</a>
                        </li>
                        <li>
                            <a href="">Why US</a>
                        </li>
                        <li>
                            <a href="">Become a Dealer</a>
                        </li>
                        <li>
                            <a href="">Support and Services</a>
                        </li>
                        <li>
                            <a href="">Site map</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer-col-title">
                        <h5 class="title">Account</h5>
                        <li>
                            <a href="">Create Account</a>
                        </li>
                        <li>
                            <a href="">Account Login</a>
                        </li>
                        <li>
                            <a href="">Forget password</a>
                        </li>
                        <li>
                            <a href="">Order Online</a>
                        </li>
                        <li>
                            <a href="">Order and Returns</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer-col-title footer-contact">
                        <h5 class="title">Contact Us</h5>
                        <!--<li>-->
                        <!--    <i class="las la-map-marker"></i> &nbsp;-->
                        <!--    <a href="">{{getSetting('post_code')}}</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <i class="las la-road"></i>-->
                        <!--    <a href="">{{getSetting('street_address')}}</a>-->
                        <!--</li>-->
                        <li>
                            <i class="las la-map-marker"></i> &nbsp;
                            <a href="">{{getSetting('address')}}</a>
                        </li>
                        <li>
                            <i class="las la-at"></i> &nbsp;
                            <a href="">{{getSetting('email')}}</a>
                        </li>
                        <li>
                            <i class="las la-phone"></i> &nbsp;
                            <a href="">{{getSetting('phone_number') .'/'. getSetting('mobile_number')}}</a>
                        </li>
                        <li>
                            <i class="las la-globe"></i>&nbsp;
                            <a href="">{{getSetting('website')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="text-dark text-center p-4">
            © {{now()->year}} {{getSetting('site_titlle')}} All rights reserved
        </p>
    </div>
</div>
<div class="scroll-to-top">
    <i class="las la-angle-double-up"></i>
</div>


{{--script tags--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js "></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="{{asset('dist/slick-1.8.1/slick/slick.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/main.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $(".navbar a").on("click", function () {
            $("html, body").animate(
                {
                    scrollTop: $($.attr(this, "href")).offset().top
                },
                1500
            );
        });
        if (window.location.hash) {
            scroll(0, 0);
            setTimeout(function () {
                scroll(0, 0);
            }, 1);
        }
        if (window.location.hash) {
            $("html, body").animate(
                {
                    scrollTop: $(window.location.hash).offset().top + "px",
                },
                1500
            );
        }
    });

    $(document).on('click', '.close', function () {
        $('#alert').hide();
    });

</script>
