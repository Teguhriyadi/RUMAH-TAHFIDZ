@extends("app/administrator/layouts/template")

@section("app_title", "Data Role")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>Profil</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">Data Profil</div>
        </div>
    </div>
    <form action="">
        @csrf
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="{{  url('/gambar/gambar_user.png') }}" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Posts</div>
                                <div class="profile-widget-item-value">187</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Followers</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Following</div>
                                <div class="profile-widget-item-value">2,1K</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{ auth()->user()->nama }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ auth()->user()->getRole->keterangan }}</div></div>
                        Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                    </div>
                    <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Follow Ujang On</div>
                        <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-github mr-1">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" class="needs-validation" novalidate="">
                        <div class="card-header">
                            <h4>
                                <i class="fa fa-edit"></i>
                                <span>Edit Profil</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{ auth()->user()->nama }}">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label for="no_hp"> No. HP </label>
                                    <input type="tel" class="form-control" name="no_hp" id="no_hp" value="{{ auth()->user()->no_hp }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Bio</label>
                                    <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i>
                                <span>Tambah</span>
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-times"></i>
                                <span>Batal</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection
