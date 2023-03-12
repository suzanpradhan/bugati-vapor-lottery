@extends('web.layouts.landing')

@section('title', ' - AnticounterFelting')

@section('content')
<section class="page-section" id="contact">
    <div class="container">
        @if(!$lottery)
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">No Lottery Available</h2>
        @else
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Join Lottery</h2>
            <h2 class="text-center text-uppercase text-secondary mb-0">{{$lottery->title}}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <form action="{{ route('web.applicant.join', [ 'id' => Crypt::encrypt($lottery->id) ]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="fullname" name="fullname" type="text" placeholder="Enter your name..." value="{{old('fullname')}}" required />
                            <label for="fullname">Full name</label>
                            @error('fullname')
                            <small id="fullname" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" value="{{old('email')}}" required />
                            <label for="email">Email address</label>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" value="{{old('phone')}}" required />
                            <label for="phone">Phone number</label>
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-dark btn-lg" type="submit">Join Lottery</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</section>
@stop