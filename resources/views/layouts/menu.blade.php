<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start active">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Menu</h3>
            </li>
            <li class=""> <a href="javascript:;">
                <i class="icon-custom-form"></i>
                <span class="title">Pengadaan</span>
                <span class="arrow data-master open "></span>
            </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{URL::to('masterbarang')}}"><i class="fa fa-circle-o"></i>All Barang</a>
                    </li>
                    <li>
                        <a href="{{URL::to('masterbarang/masuk')}}"><i class="fa fa-circle-o"></i>Barang masuk</a>
                    </li>
                    <li>
                        <a href="{{URL::to('masterbarang/history')}}"><i class="fa fa-circle-o"></i>History Barang</a>
                    </li>


                </ul>
            </li>
            <li class=""> <a href="javascript:;">
                <i class="icon-custom-form"></i>
                <span class="title">Transaksi</span>
                <span class="arrow data-master open "></span>
            </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{URL::to('transaksi')}}"><i class="fa fa-circle-o"></i>Transaksi</a>
                    </li>
                    <li>
                        <a href="{{URL::to('transaksi/show')}}"><i class="fa fa-circle-o"></i>Data Transaksi</a>
                    </li>
                </ul>

            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
