@extends('master.index')
@section('content')
    <head>
{{--        <link href="assets\libs\clockpicker\bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">--}}
        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">

    </head>
    @include('User.modal.doiMatKhau')

    <div class="modal fade bs-example-modal-center" id="xem_anh_dai_dien" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{--                <div class="modal-header">--}}
                {{--                    <h4 class="modal-title" id="myCenterModalLabel">Center modal</h4>--}}
                {{--                    --}}
                {{--                </div>--}}
                <div class="modal-body p-0">
                    <button type="button" class="close position-absolute text-danger" style="right: 1rem" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <img src="" style="width: 100%">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade bs-example-modal-center" id="doi_anh_dai_dien" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Cập nhật ảnh đại diện')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="demo-wrap upload-demo">
                        {{--                        <div class="container">--}}
                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="upload-msg">
                                    Đang tải ảnh
                                </div>
                                <div class="upload-demo-wrap">
                                    <div id="upload-demo"></div>
                                </div>
                            </div>
                        </div>
                        {{--                        </div>--}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal" id="close">{{__('Thoát')}}</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="save">
                        {{__('Chọn ảnh này')}}
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a>Thông tin</a></li>
                        <li class="breadcrumb-item active">Thông tin nhà tuyển dụng</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Phần Nhà Tuyển Dụng')}}</h4>
            </div>
        </div>
    </div>

    <div class="row" id="scroll-fixed">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1 text-right">
                <div class="btn-group btn-group-sm" style="float: none;">
                    <a class="btn btn-sm btn-primary text-white mr-4" data-toggle="modal"
                       data-target="#modal-doi-mat-khau">{{__('Đổi mật khẩu')}}</a>
                    {{--                    <button class="btn btn-warning btn-sm call-save-profile">{{__('Cập nhật')}}</button>--}}
                    <button class="btn btn-success btn-sm save-profile"
                            id="save-profile">{{__('Lưu lại tất cả')}}</button>
                    <a class="btn btn-secondary btn-sm cancel-profile" href="/nha-tuyen-dung">{{__('Không lưu')}}</a>
                </div>

            </div>

        </div>
    </div>


    <div class="row center-element nha-tuyen-dung-container">

        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card-box p-1 mb-1 text-right">
                <div class="row">
                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h4 class="bg-light p-2 text-uppercase">{{__('Thông Tin Nhà Tuyển Dụng')}}</h4></label>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="ho_ten"><abbr class="text-danger  font-15">* </abbr>{{__('Họ tên: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="ho_ten" title="Họ tên"
                               placeholder="@if(Auth::user()->ho_ten == null){{"Nhập họ tên"}}@endif"
                               value="@if(Auth::user()->ho_ten != null){{Auth::user()->ho_ten}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="email"><abbr class="text-danger  font-15">* </abbr>{{__('Email: ')}}
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                        <div class="input-group">
                            <input class="form-control email-not-null"
                                   placeholder="@if(Auth::user()->email == null){{"Nhập email"}}@endif"
                                   id="email" data-rule="email" title="Email người tuyển dụng"
                                   value="@if(Auth::user()->email != null){{Auth::user()->email}}@endif">
                            <button class="btn @if(Auth::user()->email != Auth::user()->email_confirmed){{__('btn-primary')}}@else{{__('btn-success')}}@endif" @if(Auth::user()->email != Auth::user()->email_confirmed) id="gui-xac-nhan-email" @endif>@if(Auth::user()->email != Auth::user()->email_confirmed){{__('Gửi xác thực email')}}@else{{__('Đã xác nhận')}}@endif</button>
                        </div>
                        <span class="text-success message-response"></span>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="gioi_tinh"><abbr class="text-danger  font-15">* </abbr>{{__('Địa chỉ')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="dia_chi" title="Địa chỉ" value="@if($data['nha_tuyen_dung']['dia_chi'] != null){{$data['nha_tuyen_dung']['dia_chi']}}@endif">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="gioi_tinh"><abbr class="text-danger  font-15">* </abbr>{{__('Giới tính')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <select class="form-control not-null" id="gioi_tinh_tuyen_dung" title="Giới tính">
                            <option value="" disabled selected
                                    class="text-center">{{__('Chọn giới tính')}}</option>
                            <option value="1" @if($data['nha_tuyen_dung']['gioi_tinh'] != null && $data['nha_tuyen_dung']['gioi_tinh'] == 1) selected @endif>{{__('Nam')}}</option>
                            <option value="2" @if($data['nha_tuyen_dung']['gioi_tinh'] != null && $data['nha_tuyen_dung']['gioi_tinh'] == 2) selected @endif>{{__('Nữ')}}</option>
                        </select>

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="ngay_sinh_tuyen_dung"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Ngày sinh')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="ngay_sinh_tuyen_dung" title="Ngày sinh" value="@if($data['nha_tuyen_dung']['nam_sinh'] != null){{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$data['nha_tuyen_dung']['nam_sinh'])->format('d/m/Y')}}@else{{date('d/m/Y')}}@endif">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="phone_tuyen_dung"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Số điện thoại: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null"
                               placeholder="@if(Auth::user()->phone == null){{"Nhập số điện thoại"}}@endif"
                               id="phone_tuyen_dung" title="Số điện thoại"
                               value="@if(Auth::user()->phone != null){{Auth::user()->phone}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="avatar_tuyen_dung">{{__('Ảnh đại diện: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 center-element position-relative">
                        <div style="width: 8rem;height: 8rem;" id="avatar_tuyen_dung">
                            <img src="{{asset(Session::get('avatar'))}}" class="avatar-xl img-thumbnail" data-data="{{Session::get('avatar')}}"
                                 alt="profile-image" tabindex="-1" style="width: 100%;height: 100%">
                            <div class="position-absolute center-element"
                                 style="display:none;width: 8rem;height: 8rem;background-color: rgba(50, 58, 70, .55);top:0">
                                <div>
                                    <div class="row mt-1 mb-1">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                            <button class="btn btn-success btn-sm">Đổi ảnh</button>
                                            <input type="file" class="d-none">
                                        </div>
                                    </div>
                                    <div class="row mt-1 mb-1">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                            <button class="btn btn-light btn-sm">Xem ảnh</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Giới thiệu bản thân:</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <textarea class="form-control break-custom" id="gioi_thieu">@if($data['nha_tuyen_dung']['gioi_thieu']){{$data['nha_tuyen_dung']['gioi_thieu']}}@endif</textarea>
                    </div>
                </div>
                <h5 class="mb-3 text-uppercase bg-light p-2 text-center text-md-left"><i class="mdi mdi-earth mr-1"></i>
                    {{__('Mạng xã hội:')}}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-fb">Facebook</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-facebook-official"></i></span>
                                </div>
                                {{--                                unserialize($nguoiTimViec['social'])[0]--}}
                                <input type="text" class="form-control social-link" id="social-fb" value="@if($data['nha_tuyen_dung']['mang_xa_hoi'] != null){{unserialize($data['nha_tuyen_dung']['mang_xa_hoi'])[0]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-tw">Twitter</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-twitter"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-tw" value="@if($data['nha_tuyen_dung']['mang_xa_hoi'] != null){{unserialize($data['nha_tuyen_dung']['mang_xa_hoi'])[1]}}@endif"
                                       placeholder="Username">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-insta">Instagram</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-insta" value="@if($data['nha_tuyen_dung']['mang_xa_hoi'] != null){{unserialize($data['nha_tuyen_dung']['mang_xa_hoi'])[2]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-lin">Linkedin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-linkedin"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-lin" value="@if($data['nha_tuyen_dung']['mang_xa_hoi'] != null){{unserialize($data['nha_tuyen_dung']['mang_xa_hoi'])[3]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-sky">Skype</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-skype"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-sky" value="@if($data['nha_tuyen_dung']['mang_xa_hoi'] != null){{unserialize($data['nha_tuyen_dung']['mang_xa_hoi'])[4]}}@endif"
                                       placeholder="@username">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-gh">Github</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-github"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-gh" value="@if($data['nha_tuyen_dung']['mang_xa_hoi'] != null){{unserialize($data['nha_tuyen_dung']['mang_xa_hoi'])[5]}}@endif"
                                       placeholder="Username">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{URL::asset('assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset('assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript" src="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>


    <script type="text/javascript" src="{{URL::asset('assets\js\app\nhaTuyenDung.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\js\app\doi_mat_khau.js')}}"></script>
{{--    init valiable of confirm email--}}
    <script type="text/javascript">
        let data_action_confifm = '{{Auth::user()->id}}';
    </script>
    <script type="text/javascript" src="{{URL::asset('assets\js\app\chuc-nang-gui-confirm-email.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>
    <script>
        $(function () {
            var fixedScroll = $('#scroll-fixed').offset();
            const headerTop = fixedScroll.top;
            $(window).on('scroll', function () {

                // console.log(fixedScroll.top, window.pageYOffset + 70);
                if (window.pageYOffset + 70 >= headerTop) {
                    $('#scroll-fixed').addClass('scroll-fixed-top');
                } else {
                    $('#scroll-fixed').removeClass('scroll-fixed-top');
                }
            });
        });
    </script>
@endpush
