<header>
    <nav class="navbar">
        <div class="container-lg">
            <ul class="navRoot">
                <li class="navSection logo">
                    <a href="{{ route('index') }}" class="navbar-brand " data-dropdown="admin">
                    </a>
                </li>

                <li class="navSection primary">
                    <a class="rootLink colorize" href="https://iccwbo.org/publication/incoterms-2020-practical-free-wallchart" target="_blank"> Incoterms </a>

                    <a class="rootLink hasDropdown colorize" data-dropdown="ports"> Ports </a>

                    <a class="rootLink colorize" href="https://shaarolami-query.customs.mof.gov.il/CustomspilotWeb/he/CustomsBook" target="_blank"> Taxes and duties </a>

                    <a class="rootLink hasDropdown colorize" data-dropdown="company"> Company </a>
                    <a class="rootLink colorize" href="https://chat.google.com/u/0/api/get_attachment_url?url_type=DOWNLOAD_URL&attachment_token=AD3oLg2hZsRf6eLzoMZhiuOO8JRwGZdoihXs7aP2MV82YbUEFYf%2BPZZBkPRfI3I2nDamlfZvE6W%2BHQf27DJiPSQZq4jrNxaDveZXA9nbickjMn6sbpdJMnP07NQePnbMStVhQvVVlGs2aGYIbzMG8iVztJxqYHUUPJ3%2Bj7MRggLezG7i0a4IZypJx5wKtKPU1lyqt2VT61EHagCA4scjThRi7hCc31Vk5OR6xJRRG5ILc%2BfRykF%2F0UY2YJZi%2Biw9sJO%2F9gIvp%2BDvpkukgQrhtk%2FoFBv8s4KY89I231UKB765hiLljHbSdQMx9uy82W%2BliT7cU8P3eI8uLTssh%2FqDGHfB2snr4VtQu8jQEeeMUkh65W%2BovGhuxV7dfFbYhynkJZK7KTdDkVgGfE%2B%2FNwjG6SV1%2BORWgEBJ1jYWTJM%2BLeHFigyKq3F2%2BFqPlNFfSGVMW3T%2FpvA0Rb6R1zULxkkffwjT2SoNzIPi%2BXBiKtMKOKOdD4TJLfKWvjbuBTXdIyeiJs3VqgyoNd8pphCn1qH6LVv5RXrJVJZTE4%2FN0A%3D%3D&content_type=application%2Fvnd.openxmlformats-officedocument.wordprocessingml.document&auto=true" target="_blank"> Terms </a>
                    
                </li>

                <li class="navSection secondary">
                    <!-- <a class="rootLink colorize pricing" href="services/plans/index.html">Ports</a>  -->
                    @guest
                        <a class="rootLink item-dashboard colorize" href="{{ route('login') }}">Sign in
                    @else
                        <div id="nav-prof"> 
                            <a class="dropdown-toggle rootLink colorize" href="javascript:;" data-toggle="dropdown"> 
                                <!-- <i class="fa fa-user"></i>  -->
                                {{ Auth::user()->name }}&nbsp;<i class="fa fa-bell" aria-hidden="true"></i><p id="responce"></p>
                            </a>
                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-closer">
                                <div class="country-lang-pointer"></div>
                                <li class="clearfix dropdown-header dropdown-stop">
                                    <div class="user-mini-pic">
                                         <?php
                                    if(Auth::user()->image){?>
                                        <img class="img-profile rounded-circle"
                                    src="{{ asset('public/images').'/'.Auth::user()->image }}">
                                    <?php
                                    }else{?>
                                        <img class="img-profile rounded-circle"
                                    src="{{ asset('public/uploads/profile_pic/avatar.png') }}">
                               @php
                                   }
                               @endphp
                                    </div>
                                    <div class="user-info">
                                        <div class="user-name"> {{ Auth::user()->name }} </div>
                                        @if (Auth::user()->role=="user")
                                            <div class="user-company">{{ Auth::user()->role }}</div>
                                        @endif
                                        @if (Auth::user()->role=="vendor")
                                               <div class="user-company">Forwarder</div>
                                        @endif
                                        <div class="user-id">Profile ID: {{ Auth::user()->id }}</div>
                                    </div>
                                </li>

                                <li> <a href="{{ route('user') }}"> <i class="fad fa-tachometer-alt-fast"></i> Dashboard </a> </li>
                                <!-- <li> <a href="/user/inbox"> <i class="fad fa-inbox-in"></i> Inbox </a> </li> -->
                                <!-- <li> <a href="/user/profile#profile-about"> <i class="fas fa-cog"></i> Settings </a> -->
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fad fa-sign-out"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                        <!-- <i class="fal fa-sign-right"></i> -->
                    </a>
                </li>

                <!-- Mobile navbar -->
                <li class="navSection mobile">
                    <a class="rootLink item-mobileMenu colorize">
                        <h2>Menu</h2>
                    </a>

                    <div class="popup">
                        <div class="popupContainer"> <a class="popupCloseButton">Close</a>
                            <div class="mobileProducts"> <a class="collapsible" href="#">MENU</a>
                                <div class="collapse show in">
                                    <!-- <div class="mobileProductsList">

                                        <ul>
                                            <li>
                                            <a class="linkContainer item-atlas" href="#"> 
                                                <i class="fas fa-circle"></i>
                                                Mobile URL1
                                            </a>
                                            </li>
                                            <li>
                                                <a class="linkContainer item-atlas" href="#"> 
                                                    <i class="fas fa-circle"></i>
                                                    Mobile URL2
                                                </a>
                                            </li>
                                            <li>
                                                <a class="linkContainer item-atlas" href="#"> 
                                                    <i class="fas fa-circle"></i>
                                                    Mobile URL3
                                                </a>
                                            </li>

                                        </ul>
                                    </div> -->

                                    <!--                                     
                                    <div class="mobileSecondaryNav">
                                        <ul>
                                            <li><a href="#">Pricing</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="#">Find a tool</a></li>
                                        </ul>
                                    </div> -->

                                </div> <a class="collapsible" href="#">URL</a>
                            </div> <a class="collapsible" href="#">LRU</a>

                        </div>
                    </div>
        </div>
        </li>
        <!-- Mobile navbar -->
        </ul>
        </div>
        <div class="dropdownRoot">
            <div class="dropdownBackground" style="transform: translateX(452px) scaleX(0.707692) scaleY(1.1075);">
                <div class="alternateBackground" style="transform: translateY(255.53px);"></div>
            </div>

            <div class="dropdownArrow" style="transform: translateX(636px) rotate(45deg);"></div>

            <div class="dropdownContainer" style="transform: translateX(452px); width: 368px; height: 443px;">

                <div class="dropdownSection left" data-dropdown="ports">
                    <div class="dropdownContent">
                        <div class="linkGroup">
                            <ul class="productsGroup">
                                <li>
                                    <a class="linkContainer item-payments" href="https://www.ashdodport.co.il/pages/default.aspx" target="_blank">
                                        <i class="fab fa-usps fa-2x"></i>
                                        <div class="productLinkContent">
                                            <h3 class="linkTitle">Ashdod Port</h3>
                                            <p class="linkSub">About 40 kilometers south of Tel Aviv</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a class="linkContainer item-payments" href="https://www.haifaport.co.il/" target="_blank">
                                        <i class="fas fa-pallet fa-2x"></i>
                                        <div class="productLinkContent">
                                            <h3 class="linkTitle">Haifa Port</h3>
                                            <p class="linkSub">'Israel's leading Cruise Terminal and the only turnaround terminal in Israel</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a class="linkContainer item-payments" href="https://www.maman.co.il/he/3-1-3.asp" target="_blank">
                                        <i class="far fa-torii-gate fa-2x"></i>
                                        <div class="productLinkContent">
                                            <h3 class="linkTitle">Maman</h3>
                                            <p class="linkSub">It is a full-service logistics supplier</p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a class="linkContainer item-payments" href="https://www.swissport.co.il/heb/Main/" target="_blank">
                                        <i class="fab fa-cotton-bureau fa-2x"></i>
                                        <div class="productLinkContent">
                                            <h3 class="linkTitle">Swissport</h3>
                                            <p class="linkSub">Swissport International Ltd. is an aviation services company</p>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <!-- <ul class="linkGroup linkList prodsubGroup">
                            <li>
                                <a class="linkContainer item-pricing" href="#" data-action-source="nav">
                                    <h3 class="linkTitle linkIcon"> <i class="fad fa-tags"></i> URL1 </h3>
                                </a>
                            </li>

                            <li>
                                <a class="linkContainer item-workswith" href="#">
                                    <h3 class="linkTitle linkIcon"> <i class="fad fa-tools"></i> URL2 </h3>
                                </a>
                            </li>

                        </ul> -->
                    </div>
                </div>


                <div class="dropdownSection right" data-dropdown="company">
                    <div class="dropdownContent">
                        <!-- <div class="linkGroup documentationGroup">
                            <a class="linkContainer withIcon item-documentation" href="#">
                                <h3 class="linkTitle linkIcon"> <i class="fas fa-user-tie"></i> About Us
                                </h3>
                            </a>
                        </div> -->
                        <div class="linkGroup blogGroup">

                            <a class="linkContainer withIcon item-documentation" href="{{ route('contact_us') }}">
                                <h3 class="linkTitle linkIcon"> <i class="fad fa-phone"></i> Contact us </h3>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="message_container"></div>
</header>

<input type="hidden" name="id" id="id_user" value="
<?php
    if(isset(Auth::user()->id))
    {echo Auth::user()->id; }
?>">
<script type="text/javascript">

    function timeout() {

      setTimeout(function () { bulk_sms(); }, 50000);
  } 

    function bulk_sms(){
      var id = $('#id_user').val();
    
        $.ajax({
            type:'GET',
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:"{{ route('notifications') }}",
            data:{id:id},
            success: function(msg){ 
             $('#responce').html(msg);
              //alert(msg);
             }
                  });

            timeout();
          
    }

    bulk_sms();
     
</script>