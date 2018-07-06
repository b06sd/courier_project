
<div class="sidebar" data-color="black" data-image="assets/img/Lagos1.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                   A-Courier
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/courier">
                        <i class="pe-7s-box2"></i>
                        <p>Courier</p>
                    </a>
                </li>
                <li>
                    <a href="/consignee">
                        <i class="pe-7s-note2"></i>
                        <p>Consignee</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        <i class="pe-7s-power"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
