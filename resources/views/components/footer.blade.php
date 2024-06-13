<!-- Remove the container if you want to extend the Footer to full width. -->
<div class=" my-0">
    <!-- Footer -->
    <footer class="text-center text-lg-start title-font mt-4">
        <!-- Grid container -->
        <div class="container pt-3 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row justify-content-center">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 align-items-center mx-auto mb-5">
                        {{-- <h6 class="text-uppercase mb-4 font-weight-bold">
              The ThePost Scriptum
            </h6> --}}
                        <a class="navbar-brand text-dark margin-logo" href="{{ route('home') }}"><img
                                class="logo margin-logo" src="/THE_POST_SCRIPTUM-Photoroom.png-Photoroom.png"
                                alt=""></a>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto my-1">
                        <h6 class="text-uppercase mb-4 font-weight-bold tx-3">Articoli</h6>
                        <p>
                            <a class="title-font tx-2 lnk" href="{{ route('index') }}">Tutti gli Articoli</a>
                        </p>
                        <p>
                            <a class="title-font tx-2 lnk" href="{{ route('home') }}">Ultimi articoli</a>
                        </p>
                        {{-- <p>
                            <a class="title-font tx-2 lnk">Categorie</a>
                        </p> --}}
                        
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto my-1">
                        <h6 class="text-uppercase mb-4 font-weight-bold tx-3">
                            Link Utili
                        </h6>
                        <p>
                            <a class="title-font tx-2 lnk" href="{{ route('login') }}">Accedi</a>
                        </p>
                        <p>
                            <a class="title-font tx-2 lnk" href="{{ route('register') }}">Registrati</a>
                        </p>
                        <p>
                            <a class="title-font tx-2 lnk" href="{{ route('careers') }}">Lavora con noi</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    {{-- <hr class="w-100 clearfix d-md-none" /> --}}

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto my-1 title-font">
                        <h6 class="text-uppercase mb-4 font-weight-bold tx-3">Contattaci</h6>
                        <p><i class="fas fa-home mr-3 tx-2">Italia</i></p>
                        <p><i class="fa-solid fa-envelope title-font tx-2">ThePostScriptum@gmail.com</i></i> </p>
                        <p><a class="title-font tx-2 lnk" href="{{ route('team') }}">Chi Siamo</a></p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->

            {{-- <hr class="my-3"> --}}

            <!-- Section: Copyright -->
            <section class="p-3 pt-0 justify-content-center">
                <div class="row d-flex align-items-center mt-0">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8 text-center text-md-start title-font">
                        <!-- Copyright -->
                        <div class="p-1">
                            © 2024 Copyright:
                            <a class="title-font tx-2 lnk" href="">ThePostScriptum.ps</a>
                        </div>
                        <!-- Copyright -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end mt-0">
                        <!-- Facebook -->
                        <a class="btn  btn-floating m-1" class="tx-3" role="button"><i class="bi bi-facebook"></i>
                        </a>

                        <!-- Twitter -->
                        <a class="btn  btn-floating m-1" class="tx-3" role="button"><i
                                class="bi bi-twitter-x"></i></a>

                        <!-- Discord -->
                        <a class="btn  btn-floating m-1" class="tx-3" href="https://discord.gg/CSvDDjTM" role="button"><i class="bi bi-discord"></i></a>

                        <!-- Instagram -->
                        <a class="btn  btn-floating m-1" class="tx-3" role="button"><i
                                class="bi bi-instagram"></i></a>
                    </div>
                    <!-- Grid column -->
                </div>
            </section>
            <!-- Section: Copyright -->
        </div>
        <!-- Grid container -->
    </footer>
    <!-- Footer -->
</div>
<!-- End of .container -->
