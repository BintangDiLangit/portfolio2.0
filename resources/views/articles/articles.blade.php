@extends('articles/layouts/master')

@section('title')
    Articles
@endsection

@section('main')
    <div class="container">

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="sidebar">
                    <h3 class="sidebar-title">Article</h3>
                    <!-- Search -->
                    <form action="#" class="mb-4">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control bg-dark" placeholder="Cari...">
                            </div>
                        </div>
                    </form>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Beranda</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                <h1>Portfolio</h1>
                <p>Ini adalah halaman portfolio saya.</p>



                <!-- Artikel -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Judul Artikel</h2>
                    </div>
                    <div class="card-body">
                        <img src="img/article.jpg" class="card-img-top" alt="Gambar Artikel">
                        <p class="card-text">Deskripsi singkat tentang isi artikel</p>
                        <p class="card-text">Teks artikel</p>
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                </div>

                <!-- Artikel -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Judul Artikel Lainnya</h2>
                    </div>
                    <div class="card-body">
                        <img src="img/article-2.jpg" class="card-img-top" alt="Gambar Artikel Lainnya">
                        <p class="card-text">Deskripsi singkat tentang isi artikel lainnya</p>
                        <p class="card-text">Teks artikel lainnya</p>
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
