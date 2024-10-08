@extends('UI.master')
@section('content')
<div class="container">
    <div style="height: 90px">

    </div>
    <div class="row">
        <div class="col-6">
            <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3801.8876929468115!2d95.4553865735922!3d17.6554773950298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c0c112588a0061%3A0xf5c6f212a9320ba7!2sUniversity%20of%20Computer%20Studies%2C%20Hinthada!5e0!3m2!1sen!2smm!4v1719460424160!5m2!1sen!2smm"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-6">
            <div class="card" style="width:100%;">
                <img class="card-img-top" src="{{asset('user/images/ucsh1.jpg')}}" alt="Card image cap" style="width:100%;height:263px">
                <div class="card-body">
                  <h5 class="card-title">ကျောင်းသားရေးရာ</h5>

                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">ဖုန်းနံပါတ်&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+959 254 896 191 </li>
                  <li class="list-group-item">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;studentairfair@gmail.com</li>

                </ul>

              </div>
        </div>

    </div>
</div>

@endsection

