@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">General/</span> Setting</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">General setting</h5>
          </div>


          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif


          <div class="card-body">
            <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="company_name">Company Name</label>
                      <input type="text" value="{{ get_setting_data('company_name') }}"  name="company_name" class="form-control" id="company_name" placeholder="Company Name" />
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="company_email">Company Email</label>
                      <input type="email" value="{{ get_setting_data('company_email') }}"  name="company_email" class="form-control" id="company_email" placeholder="Company Email" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="company_phone">Company phone</label>
                      <input type="text" value="{{ get_setting_data('company_phone') }}"  name="company_phone" class="form-control" id="company_phone" placeholder="Company phone" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="company_address">Company address</label>
                      <input type="text" value="{{ get_setting_data('company_address') }}"  name="company_address" class="form-control" id="company_address" placeholder="Company address" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="company_hours">Company hours</label>
                      <input type="text" value="{{ get_setting_data('company_hours') }}"  name="company_hours" class="form-control" id="company_hours" placeholder="Company hours" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="copyright">Copyright</label>
                      <input type="text" value="{{ get_setting_data('copyright') }}"  name="copyright" class="form-control" id="copyright" placeholder="Copyright" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="facebook">facebook</label>
                      <input type="text" value="{{ get_setting_data('facebook') }}"  name="facebook" class="form-control" id="facebook" placeholder="facebook" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="twitter">twitter</label>
                      <input type="text" value="{{ get_setting_data('twitter') }}"  name="twitter" class="form-control" id="twitter" placeholder="twitter" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="linkedin">linkedin</label>
                      <input type="text" value="{{ get_setting_data('linkedin') }}"  name="linkedin" class="form-control" id="linkedin" placeholder="linkedin" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="instagram">instagram</label>
                      <input type="text" value="{{ get_setting_data('instagram') }}"  name="instagram" class="form-control" id="instagram" placeholder="instagram" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="pinterest">pinterest</label>
                      <input type="text" value="{{ get_setting_data('pinterest') }}"  name="pinterest" class="form-control" id="pinterest" placeholder="pinterest" />
                    </div>
                  </div>
                </div>
                

              <button type="submit" class="btn btn-success">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop