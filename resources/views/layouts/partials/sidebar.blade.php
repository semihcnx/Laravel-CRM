<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="{{route('anasayfa')}}" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="/images/tltlogo.png" alt="" class="logo logo-lg">
					<img src="/images/tltlogo-sm.png" alt="" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>Navigation</label>

                    </li>
                    <li class="pc-item"><a href="{{route('anasayfa')}}" class="pc-link "><span class="pc-micon"><i data-feather="home"></i></span><span class="pc-mtext">Anasayfa</span></a></li>

					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="layers"></i></span><span class="pc-mtext">Müşteriler</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a  class="pc-link" href="{{route('musteri')}}">Müşteriler</a></li>
							<li class="pc-item"><a  class="pc-link" href="{{route('musteri.yeni')}}">Müşteri Ekle</a></li>

						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="gift"></i></span><span class="pc-mtext">Ürünler</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="{{route('urun')}}">Ürünler</a></li>
							<li class="pc-item"><a class="pc-link" href="{{route('urun.yeni')}}">Ürün Ekle</a></li>

						</ul>
					</li>
					<li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="user"></i></span><span class="pc-mtext">Kategoriler</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="{{route('kategori')}}">Kategoriler</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{route('kategori.yeni')}}">Kategori Ekle</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{route('kategori-ozellik')}}">Kategori Özellik</a></li>

						</ul>
                    </li>


                    <li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="user"></i></span><span class="pc-mtext">Kullanıcılar</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="{{route('kullanici')}}">Kullanıcılar</a></li>
							<li class="pc-item"><a class="pc-link" href="{{route('kullanici.yeni')}}">Kullanıcı Ekle</a></li>

						</ul>
                    </li>

                    <li class="pc-item pc-hasmenu">
						<a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="user"></i></span><span class="pc-mtext">Servisler</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
						<ul class="pc-submenu">
							<li class="pc-item"><a class="pc-link" href="user-profile.html">Servisler</a></li>
							<li class="pc-item"><a class="pc-link" href="user-profile-social.html">Servis Ekle</a></li>

						</ul>
					</li>
                   </ul>
			</div>
		</div>
	</nav>
